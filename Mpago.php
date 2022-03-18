
<?php
    require __DIR__ .  '/vendor/autoload.php';

    class Mpago{
        
        public function confPreferencia(){
            MercadoPago\SDK::setAccessToken('TEST-96b16e87-31b8-477f-9f0b-71a8db653e96');
            // Crea un objeto de preferencia
            $preference = new MercadoPago\Preference();

            // Crea un ítem en la preferencia
            $item = new MercadoPago\Item();
            $item->id = "1234";
            $item->title = "Heavy Duty Plastic Table";
            $item->description = "Table is made of heavy duty white plastic and is 96 inches wide and 29 inches tall";
            $item->category_id = "home";
            $item->quantity = 1;
            $item->currency_id = "MXN";
            $item->unit_price = 75.56;
            $preference->items = array($item);

            $preference->payment_methods = array(
                "excluded_payment_methods" => array(
                  array("id" => "master")
                ),
                "excluded_payment_types" => array(
                  array("id" => "ticket")
                ),
                "installments" => 12
            );

            $preference->back_urls = array(
                "success" => "http://localhost:8080/feedback",
                "failure" => "http://localhost:8080/feedback", 
                "pending" => "http://localhost:8080/feedback"
            );
            $preference->auto_return = "approved"; 
    
            $preference->save();
    
            $response = array(
                'id' => $preference->id
            ); 
            return $response;
        }
    }
?>
