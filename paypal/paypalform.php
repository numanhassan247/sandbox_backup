<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title></title>
            <style>
                    body{  
                    background: #2D2D2D; /* Set Website Background Color */  
                    font: 11px 'Verdana'; /* Set Website Font Size & Font Type */  
                }  

                #wrap{  
                    margin: 0 auto; /* Center Our Content */  
                    width: 500px; /* Set The Width For Our Content */  
                    background: #FFF; /* Set Content Background Color */  
                    padding: 10px; /* Set Padding For Content */  
                    border: 1px solid #000; /* Add A Border Around The Content */  
                }  


            </style>
            
    </head>
    <body>
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
        <html xmlns="http://www.w3.org/1999/xhtml">  
            <head>  
                <title>Pay pal Payment Practice</title>  
                
            </head>  
            <body>  

                <div id="wrap">  
                    <h3>Welcome </h3>
                    <br><br>

<!--                    <form target="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="AT34A6ESYMGMJ">
                        <table>
                        <tr><td><input type="hidden" name="on0" value="Name of drop-down menu">Name of drop-down menu</td></tr><tr><td><select name="os0">
                            <option value="Option 1">Option 1 $0.01 USD</option>
                            <option value="Option 2">Option 2 $0.02 USD</option>
                            <option value="Option 3">Option 3 $0.03 USD</option>
                        </select> </td></tr>
                        </table>
                        <input type="hidden" name="currency_code" value="USD">
                        <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                        </form>-->
                        item_name_1 - $1.00 - (1)
                        <br><br><br>
                        item name 2 - $2.00 - (3)
                            
                        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                                
                            <input type="hidden" name="cmd" value="_cart">
                            <input type="hidden" name="upload" value="1">
                            <input type="hidden" name="business" value="numan.hassan-facilitator@purelogics.net">

                            <input type="hidden" name="item_name_1" value="Item Name 1">
                            <input type="hidden" name="amount_1" value="100.00">
                            <input TYPE="hidden" name="quantity_1" value="1">

                            <input type="hidden" name="item_name_2" value="Item Name 2">
                            <input type="hidden" name="amount_2" value="200.00">
                            <input TYPE="hidden" name="quantity_2" value="3">

                            
                            <input type="hidden" name="shipping_1" value="10.00">

    
                            <input type="hidden" name="tax_cart" value="5.00">
                            <input type="hidden" name="discount_amount_cart" value="100">


                            <input type="hidden" name="rm" value="2">
                            <input type="hidden" name="return" value="www.return.com">
                            <input type="hidden" name="cancel_return" value="www.cancle.com">
                            <input type="hidden" name="custom" value="send-custom-value">

                            <input type="image" src="paypal.png" style="width: 134px; height: 70px">
                                    
                        </form>


                    
                </div>  

            </body>  
        </html>  
    </body>
</html>
