@if($details['email_type'] == 1)
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Mail</title>
</head>
<body>
    <h1>{{$details['title']}}</h1>
    <p>{{$details['body']}}</p>
    <p>
            Hi {{$details['name']}}, please find the attached of your result.
        </p>
        <p>Warm Regards,</p>
        <p><b>Clinic @ Sukai</b></p>
        <p>
        <b>T : </b>+91 123456789 <br>
        <b>W : </b>www.sukai.com <br>
        513 Arenja Corner Sector 17 Mumbai-702
        </p>
</body>
</html>

@elseif($details['email_type'] == 2)
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mail reader</title>
</head>

<body style="padding: 0px; margin: 0px;">
    <div style="display: flex; justify-content: space-between; padding: 0px 10px; box-shadow: 0px 1px 6px 0px lightgrey;">
        <img src="{{ URL::asset('/images/sukaii_transparent_logo.png')}}" alt="Sukaii" style="max-width: 125px; width: 25%; height: 53px;">
        <h5>Total Amount : <span>680</span></h5>
    </div>
    <div>
        <h1 style="margin-bottom: 0px; padding-left: 11px; margin-top: 14px; font-size: 23px; word-spacing: 1px; letter-spacing: 0.5px;">Your order Confirmed</h1>
    </div>
    <div style="padding: 13px;">
        <h3 style="margin: 0px 0px 10px 0px;">Hello mr. Narendra,</h3>
        <p style="margin: 0px;">Thank you for choosing Sukaii. This email contains important information about your order. Please save it for future reference.</p>
        <p style="margin: 5px 0px; padding-top: 10px;"> We're recive your order No. <b>OD44434324</b> <br>
        </p>
    </div>

    <div class="container" style="margin: 0rem 0rem; border: 1px solid black;">
        <div class=" row" style="display: flex; justify-content: center;">
            <div class="col-md-10">
                <div class="receipt" style="background-color: white; padding: 1rem; border-radius: 3px;">
                    <h6 class="name" style="margin:.5rem 0rem">Shipping Address</h6>
                    <span style="font-size: 12px; color: rgba(0,0,0)!important;">513-B Arenja Corner Vashi Mumabi-87567</span><br>


                    <!-- <p>513-B Arenja Corner Vashi Mumabi-87567</p> -->
                    <span style="font-size: 12px; color: rgba(0,0,0,.5)!important;">your order has been confirmed and will be shipped in two days</span>
                    <hr>
                    <div class="order-details" style="display: flex; flex-direction: row; justify-content: space-between; align-items: center;">
                        <div><span style="display: block; font-size:12px; ">Order date</span><span><b >12/03/2022</b></span></div>
                        <div><span style="display: block; font-size:12px; ">Order number</span><span><b>OD44434324</b></span></div>
                        <div><span style="display: block; font-size:12px; ">Payment method</span><span><b>Credit card</b></span></div>
                    </div>
                    <hr>
                    <div class="product-details" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="product-name-image" style="display: flex; flex-direction: row;">
                            <div style="display: flex; flex-direction: column; justify-content: space-between; margin-left: .5rem;">
                                <div><span class="p-name" style="display: block;"><b>Complete Blood Count (CBC)</b></span><span style="font-size: 12px;">Blood Test</span></div><span style="font-size: 12px;">Qty: 1 service</span>
                            </div>
                        </div>
                        <div class="product-price">
                            <h6>THB 300</h6>
                        </div>
                    </div>
                    <div class="product-details" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="product-name-image" style="display: flex; flex-direction: row;">
                            <div style="display: flex; flex-direction: column; justify-content: space-between; margin-left: .5rem;">
                                <div><span class="p-name" style="display: block;"><b>Complete Blood Count (CBC)</b></span><span style="font-size: 12px;">Blood Test</span></div><span style="font-size: 12px;">Qty: 1 service</span>
                            </div>
                        </div>
                        <div class="product-price">
                            <h6>THB 300</h6>
                        </div>
                    </div>
                    <div class="product-details" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="product-name-image" style="display: flex; flex-direction: row;">
                            <div style="display: flex; flex-direction: column; justify-content: space-between; margin-left: .5rem;">
                                <div><span class=" p-name" style="display: block;"><b>Electrocardiography (ECG)</b></span><span style="font-size: 12px;">check heart  </span></div><span style="font-size: 12px;">Qty: 1 service</span>
                            </div>
                        </div>
                        <div class="product-price">
                            <h6>THB 350</h6>
                        </div>
                    </div>
                    <div class="amount row" style="margin-top:1rem">
                        <div class="col-sm-6" style="display: flex; justify-content: center;"><img src="https://i.imgur.com/AXdWCWr.gif" width="250" height="100" style="margin-bottom: 1rem;"></div>
                        <div class="col-sm-6">
                            <div class="billing">
                                <div style="margin-bottom: .5rem; display: flex; justify-content: space-between;"><span>Subtotal</span><span class="font-weight-bold">THB 650</span></div>
                                <div style="display: flex; justify-content: space-between; margin-bottom: .5rem;"><span>Home Service fee</span><span><b>THB 50</b></span></div>
                                <div style="display: flex; justify-content: space-between; margin-bottom: .5rem;"><span>Tax</span><span><b>THB 5</b></span></div>
                                <div style="display: flex; justify-content: space-between; margin-bottom: .5rem;"><span style="color: #28a745!important;">Discount</span><span style="color: #28a745!important;"><b>THB 25</b></span></div>
                                <hr>
                                <div style="display: flex; justify-content: space-between; margin-bottom: .25rem;"><span><b>Total</b></span><span style="color: #28a745!important;"><b>THB 680</b></span></div>
                            </div>
                        </div>
                    </div><span style="margin-top: .75rem; display: block;">Expected Appoint date</span><span style="color: #28a745!important;"><b>12 March 2022</b></span><span style="display: block; margin-top: 1rem; font-size: 15px; color: rgba(0,0,0,.5)!important;">We will be sending a service confirmation email when the service is completed!</span>
                    <hr>
                    <div class="footer" style="display: flex; justify-content: space-between; align-items: baseline;">
                        <div class="thanks"><span style="display: block;"><b>Thanks for Book <br>(service name) Service</b></span><span>Sukaii team</span></div>
                        <div class="d-flex flex-column justify-content-end align-items-end" style="display: flex; justify-content: space-between; align-items: center;"><span style="display: block;"><b>Need Help?</b><br>Call - 974493933</span></div>
                    </div>
                    <div class="home_btn " style="text-align: center; margin-top: 3rem;">
                        <a href="./index.html"><button type="button" class="btn btn-info ">Visit to sukaii</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
@elseif($details['email_type'] == 3)
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p style="padding: 1rem; text-align: justify;">Dear {{$details['name']}},<br> Welcome, We thank you for your registration at Sukaii website.<br><br> Your user id is <b>{{$details['username']}}</b><br><br>
        <!-- Your email id Verification OTP code is : 375813 -->
        You will use this user id given above for booked all your services on <a href="sukaii.ecovisrkca.com">Sukaii.</a><br><br> The user id cannot be changed and hence we recommend that you store this email for your future reference.<br><br> We understand
        that you have read and agreed to the Terms and Conditions as applicable for transactions on our site. You can now book your services online. We hope to offer you a uniquely pleasant experience in planning and booking your servises with the
        <a href="sukaii.ecovisrkca.com">Sukaii</a>. We look forward to having you use our services regularly. In case you require any further assistance, please mail us at <a href="https://accounts.google.com/signin/v2/identifier?flowName=GlifWebSignIn&flowEntry=ServiceLogin"><b>admin@suakii.com</b></a>        or call us at 24*7 Hrs. Customer Support at <b>888777666554</b>.</p>
</body>
</html>
   
@endif