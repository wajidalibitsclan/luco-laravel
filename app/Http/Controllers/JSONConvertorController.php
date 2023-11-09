<?php

namespace App\Http\Controllers;

use App\Article;
use App\Media;
use App\Page;
use App\Term;
use App\User;
use App\Video;
use App\VideoCategory;
use App\Vocabulary;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



class JSONConvertorController extends Controller
{
    public function videos(){
        $jsonFileContents = file_get_contents(public_path('json/article.json'));
        $data = json_decode($jsonFileContents, true);


        foreach ($data as $key => $value) {
            // dd($value);

            $mysqlDatetime = null;

            if(isset($value['data_di_pubblicazione'])){
                try{
                    $iso8601Datetime = $value['data_di_pubblicazione']['$date'];
                $datetime = new DateTime($iso8601Datetime);
                $mysqlDatetime = $datetime->format('Y-m-d H:i:s');
                }catch(\Exception $error){
                    dd($error);
                }
            }

            $category = null;
            $persone = null;
            $locandina = null;
            $gallery = null;
            $altri_file = null;
            $interviste_e_dichiarazioni = null;
            $rassegna_stampa = null;

            if(isset($value['categorie'])){
                $category = json_encode($value['categorie']);
            }

            if(isset($value['locandina'])){
                $locandina = json_encode($value['locandina']);
            }

            if(isset($value['persone'])){
                $locandina =  $persone = json_encode($value['persone']);
            }

            if(isset($value['gallery'])){
                $gallery = json_encode($value['gallery']);
            }

            if(isset($value['altri_file'])){
                $altri_file = json_encode($value['altri_file']);
            }

            if(isset($value['interviste_e_dichiarazioni'])){
                $interviste_e_dichiarazioni = json_encode($value['interviste_e_dichiarazioni']);
            }

            if(isset($value['rassegna_stampa'])){
               $rassegna_stampa = json_encode($value['rassegna_stampa']);
            }

            Article::create([
                "type" => $value['type'],
                "title" => $value['title'],
                "citta" => $value['citta'],
                "data_di_pubblicazione" => $mysqlDatetime,
                "immagine_in_evidenza" => $value['immagine_in_evidenza'],
                "status" => $value['status'],
                "old_id" => $value['old_id'],
                "slug" => $value['slug'],
                "updated_at" => $value['updated_at']['$date'],
                "created_at" => $value['created_at']['$date'],
                "body" => $value['body'],
                "locandina" => $locandina,
                "persone" => $persone,
                "interviste_e_dichiarazioni" => $interviste_e_dichiarazioni,
                "rassegna_stampa" => $rassegna_stampa,
                "sotto_titolo" => $value['sotto_titolo'],
                "riassunto" => $value['riassunto'],
                "teatro" => $value['teatro'],
                "testo_libero_locandina" => $value['testo_libero_locandina'],
                "altri_file" => $altri_file,
                "categorie" => $category,
                "gallery" => $gallery
            ]);


            //  Media::create([
            //     'type' => $value['type'],
            //     'filename' => $value['filename'],
            //     'file_path' => $value['file_path'],
            //     'extension' => $value['extension'],
            //     'updated_at' => $value['updated_at']['$date'],
            //     'created_at' => $value['created_at']['$date']
            //  ]);

            // Page::create([
            //     'title' => $value['title'],
            //     'slug' => $value['slug'],
            //     'updated_at' => $value['updated_at']['$date'],
            //     'created_at' => $value['created_at']['$date'],
            //     'body' => $value['body']
            // ]);

            // Term::create([
            //     'termine' => $value['termine'],
            //     'vocabulary_id' => $key +1,
            //     'slug' => $value['slug'],
            //     'created_at' => $value['created_at']['$date'],
            //     'updated_at' => $value['updated_at']['$date']
            // ]);

            // Vocabulary::create([
            //     'title' => $value['title'],
            //     'slug' => $value['slug'],
            //     'created_at' => $value['created_at']['$date'],
            //     'updated_at' => $value['updated_at']['$date']
            // ]);

            // User::create([
            //     'name' => $value['name'],
            //     'email' => $value['email'],
            //     'password' => $value['password'],
            //     'slug' => $value['slug'],
            //     'remember_token' => $value['remember_token'],
            //     'created_at' => $value['created_at']['$date'],
            //     'updated_at' => $value['updated_at']['$date']
            // ]);
            // VideoCategory::create([
            //     'name' => $value['name'],
            //     'order' => $value['order'],
            //     'created_at' => $value['created_at']['$date'],
            //     'updated_at' => $value['updated_at']['$date']
            // ]);
            // Video::create([
            //     'title' => $value['title'],
            //     'link' => $value['link'],
            //     'description' => $value['description'],
            //     'category_id' => $key + 1,
            //     'order' => $value['order'],
            //     'update_at' => $value['updated_at']['$date'],
            //     'created_at' => $value['created_at']['$date']
            // ]);

        }

        dd("done");

    }
}
