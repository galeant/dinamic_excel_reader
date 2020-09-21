<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ExcelReader;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;
use DB;

use App\Models\Document;
use App\Models\DocumentType;
use App\Models\DocumentField;
use App\Models\DocumentCategory;
use App\Models\Field;
use App\Models\DocumentValue;
use Carbon\Carbon;


class BebekController extends Controller
{
    private $config, $default;

    public function __construct()
    {
        $this->default = Config::get('exceldoc.default');
        $this->config = Config::get('exceldoc.finance');
    }
    public function index(Request $request)
    {
        DB::beginTransaction();
        try {
            $main_category = DocumentCategory::firstOrCreate(
                ['name' => 'Financial']
            );
            $sheet = ExcelReader::index($request->file('file'));
            // dd($sheet);
            $recap = [];
            $doc_order = 1;
            foreach ($sheet as $identifier => $data_sheet) {
                $sub_category = DocumentCategory::firstOrCreate([
                    'name' => $data_sheet['title']
                ]);
                $con = $this->default;
                if (isset($this->config[$identifier])) {
                    $con = $this->config[$identifier];
                }
                $docs = [];
                foreach ($con as $cn) {
                    // dd($cn);
                    $limit_head_start  = alfabetTranslator($cn['col_range'][0]);
                    $limit_head_end  = alfabetTranslator($cn['col_range'][1]);
                    $head = [];
                    $field = [];
                    $res = [];
                    for ($i = $limit_head_start; $i <= $limit_head_end; $i++) {
                        $head[alfabetTranslator($i, TRUE)] = $data_sheet['data'][$cn['header_row']][alfabetTranslator($i, TRUE)];
                        // $head[alfabetTranslator($i, TRUE)]['identifier'] = Str::slug($data_sheet['data'][$cn['header_row']][alfabetTranslator($i, TRUE)], '-');
                    }
                    // dd($head);
                    // dd($data_sheet['data']);
                    if ($cn['attribute_col'] !== NULL) {
                        for ($j = $cn['data_start']; $j <= count($data_sheet['data']); $j++) {
                            if (!empty($data_sheet['data'][$j][$cn['attribute_col']])) {
                                $field[$j] = $data_sheet['data'][$j][$cn['attribute_col']];
                            }
                        }
                        foreach ($head as $ihd => $hd) {
                            foreach ($field as $ifl => $fl) {
                                $res[$hd][$fl] = $data_sheet['data'][$ifl][$ihd];
                            }
                        }
                    } else {
                        foreach ($head as $ihd => $hd) {
                            $res[$hd] = [];
                            for ($f = $cn['data_start']; $f <= count($data_sheet['data']); $f++) {
                                if (!empty($data_sheet['data'][$f][$ihd])) {
                                    $res[$hd][] = $data_sheet['data'][$f][$ihd];
                                }
                            }
                        }
                    }
                    $docs[] = $res;
                }
                $document = Document::create([
                    'category_id' => $sub_category->id,
                    'main_category_id' => $main_category->id,
                    'month' => Carbon::now()->format('m'),
                    'order' => $doc_order++,
                    'subsidiaries_id' => 1,
                    'year' => Carbon::now()->format('Y')
                ]);

                $subdoc_order = 1;
                foreach ($docs as $dc) {
                    $doc_field_order = 1;
                    $df['subdocument_order'] = $subdoc_order++;
                    foreach ($dc as $icdc => $cdc) {
                        $field = Field::firstOrCreate(
                            [
                                'identifier' => Str::slug($icdc)
                            ],
                            [
                                'name' => $icdc
                            ]
                        );
                        $df['document_id'] = $document->id;
                        $df['field_id'] = $field->id;
                        $df['order'] = $doc_field_order++;
                        $document_field = DocumentField::create($df);

                        $doc_value_order = 1;
                        foreach ($cdc as $igcdc => $gcdc) {
                            $field = NULL;
                            if (gettype($igcdc) === 'string') {
                                $field = Field::firstOrCreate(
                                    [
                                        'identifier' => Str::slug($igcdc)
                                    ],
                                    [
                                        'name' => $igcdc
                                    ]
                                );
                                $field = $field->id;
                            }
                            $document_value = DocumentValue::create([
                                'document_field_id' => $document_field->id,
                                'field_id' => $field,
                                'value' => $gcdc,
                                'order' => $doc_value_order++
                            ]);
                        }
                    }
                }
                $recap[$identifier] = $docs;
            }
            dd($recap);
            DB::commit();
            dd('kita test');
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
        }
    }
}
