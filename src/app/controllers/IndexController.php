<?php
//  require_once ""
 require_once "../vendor/autoload.php";
          
 use GuzzleHttp\Client;
   
use Phalcon\Mvc\Controller;


class IndexController extends Controller
{
    public function indexAction()
    {      
    
    }

    public function weatherAction()
    {      
        print_r($this->request->getPost());
      
        $url = $this->request->get('search');
        $len = strlen($url);
        for ($i = 0; $i < $len; $i++) {
            if ($url[$i] == ' ') {
                $url[$i] = '+';
            }
        }

        $current = 'http://api.weatherapi.com/v1/search.json?key=0bab7dd1bacc418689b143833220304&q='.$url;
       
        $client = new Client([
            'base_uri' => $current,
        ]);
          
        
        $response = $client->request('GET');
          
          
        $body = $response->getBody();
        $arr_body = json_decode($body,true);
        $this->view->current_var = $arr_body;
    }


    
    public function particularCountryAction()
    { 
        echo "aakash";
        echo $this->request->getPost('c_name');
        echo $this->request->getPost('id');
        die;
    }
  
}