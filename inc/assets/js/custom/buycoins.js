$('.service_type').change(function() {
    var idx = this.selectedIndex;      
    if(idx == '1'){
    	var newcontent= '<div class="card text-left">'+
    				'<div class="card-body">'+
                      '<h4 class="card-title">Take Cheque Photo</h4>'+
                      '<form onsubmit="event.preventDefault();"  id="myform" >'+
                        '<div class="fallback dropzone dropzone-area"> '+
                         ' <input name="cheque_image" class="cheque_image" id="cheque_image" type="file" />'+
                         
                         '</div>'+
                         '<br>'+
                          '<div class="row">'+
                          '<div class="col-md-12 form-group mb-3">'+
                       '<button type="submit" class="btn btn-primary" onclick="upload_cheque()" >Submit</button>'+
                       '</div></div>'+
                      '</form>  '+
                    '</div>'+
                  '</div>';
    	$('.form-area').empty().append(newcontent);
    } 
    else if(idx == 2){
	var newcontent ='<div class="card text-left">'+
                    '<div class="card-body">'+
                      '<h4 class="card-title">Charge with Stripe</h4>'+
                     
                      '<span class="payment-errors"></span> '+
                 
                      '<form onsubmit="event.preventDefault();" method="POST" id="paymentFrm">'+
                      '<div class="row">'+
                          ' <div class="col-md-12 form-group mb-3">'+
                             '<label for="Name">Name</label>'+
                             '<input type="text" class="form-control" name="name" id="name" placeholder="Enter your Name">'+
                           '</div>'+
                         '</div>'+
                         '<div class="row">'+
                          ' <div class="col-md-12 form-group mb-3">'+
                            ' <label for="email">Email</label>'+
                            ' <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">'+
                           '</div>'+
                         '</div>'+
                        '<div class="row">'+
                          '<div class="col-md-12 form-group mb-3">'+
                            '<label for="Card Number">Card Number</label>'+
                            '<input type="text" class="form-control" name="CardNumber" id="CardNumber" placeholder="Enter your CardNumber">'+
                          '</div>'+
                        '</div>'+
                        '<div class="row">'+
                          '<div class="col-md-12 form-group mb-3">'+
                           ' <label for="CVC">CVC</label>'+
                            '<input type="number" class="form-control" name="CVC" size="4" autocomplete="off" id="CVC" placeholder="Enter your CVC">'+
                          '</div>'+
                        '</div>'+
                        '<div class="row">'+
                          '<div class="col-md-12 form-group mb-3">'+
                            '<label>Expiration (MM/YYYY)</label>'+
                            '<input type="text" name="exp_month" size="2" class="card-expiry-month"/>'+
                            '<span> / </span>'+
                            '<input type="text" name="exp_year" size="4" class="card-expiry-year"/>'+
                          '</div>'+
                        '</div>'+
                        '<button type="submit" class="btn btn-primary" id="payBtn" onclick="paynow()">Submit</button>'+
                      '</form>'+
                     
                    '</div>'+
                  '</div>';
                  $('.form-area').empty().append(newcontent);
                  $("#paymentFrm").validate({
            rules: {
            	name: "required",
                CardNumber:{required: true,creditcard: true,maxlength:16,minlength:16},
                CVC:{required: true,maxlength:3 ,minlength:3},
                exp_month:{required: true,maxlength:2 ,minlength:2},
                exp_year:{required: true,maxlength:4 ,minlength:4},
                 email: {required: true,email: true}
                }
            });
            $("#main_form").validate({
            rules: {
                amount: "required",
                service_type: {required: true}
                }
            }); 

    } 
    else
    {
 		$('.form-area').empty().append('');
    }
});

function paynow(){
var form = $( "#paymentFrm" );
var main_form = $( "#main_form" );
if(form.valid() && main_form.valid())
    {
        postdata();
    }
}
function postdata(){
    var form = ($('#paymentFrm').serializeArray());
    var data = {};
    $.each( form, function( key, value ){data[value['name']] = value['value'];});
    data['amount'] = $('.amount').val();
    var url =  "<?=$baseurl?>/buycoins/stripe/submit.php";
    $.ajax( {
      cache: false,
    contentType: false,
    processData: false,
    method: 'POST',
    type: 'POST',
    data: JSON.stringify(data),
      url: url,
      success: function( feedback ){
         sendtoserver();
      } 
  });}
function upload_cheque(){
var data = {};
	var FR= new FileReader();
    FR.addEventListener("load", function(e) {
   data['cheque_image'] = (e.target.result);
   data['amount'] = $('.amount').val();
    data['transection_type'] = 'Buy';
    data['userid'] = '1';
    data['service_type'] = 'Cheque';
    var url =  "<?=$apiurl?>/buy_coin.php?param=upload_cheque";
    $.ajax( {
      cache: false,
    contentType: false,
    processData: false,
    method: 'POST',
    type: 'POST',
    data: JSON.stringify(data),
      url: url,
      success: function( feedback ){
         alert(feedback);
      } 
  });
    }); 
    FR.readAsDataURL(  $('#cheque_image').prop('files')[0] );
}

function sendtoserver(){
    var data = {};
    data['amount'] = $('.amount').val();
    data['transection_type'] = 'Buy';
    data['userid'] = '1';
    data['service_type'] = 'Stripe';
    var url =  "<?=$apiurl?>/buy_coin.php?param=upload_cheque";
    $.ajax( {
      cache: false,
    contentType: false,
    processData: false,
    method: 'POST',
    type: 'POST',
    data: JSON.stringify(data),
      url: url,
      success: function( feedback ){
         alert(feedback);
      } 
  });
}