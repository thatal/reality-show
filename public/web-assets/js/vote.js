$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
// _token = $('meta[name="csrf-token"]').attr('content');
VoteNow = function(Obj){
    var url = 'vote';
    // $('#vote-now').modal();
    $thisObj        = $(Obj);
    var $objParent  = $thisObj.parents('.blog-box');
    var imgSRC      = $objParent.find('.blog-img').find('img').first().prop('src');
    var contName    = $objParent.find('.cont-name').text();
    var voteID      = $thisObj.attr('sun-data-id');
    console.log(contName);
    console.log(imgSRC);
    console.log(voteID);
    // url += voteID;
    // swal({
    //     title:"Thanks, Voting Success.",
    //     type: 'success',
    //     confirmButtonClass: 'btn-success btn-md'
    // });
    EnterMobile(voteID, url);
    return false;
}
EnterMobile = function(voteID, ajaxUrl, value = null){
    if (value == null) {
        value = "Please Enter your mobile Number:";
    }
    swal({
        title: "Mobile Number",
        text: value,
        type: "input",
        showCancelButton: true,
        closeOnConfirm: false,
        inputPlaceholder: "Mobile Number",
        showLoaderOnConfirm: true
    }, function (inputValue) {
        if (inputValue === false) return false;
        inputValue = inputValue.trim();
        if (inputValue === "") {
            swal.showInputError("Please Enter your mobile number");
            return false;
        }
        console.log(typeof(inputValue))
        if (inputValue.length != 10) {
            swal.showInputError("Please Enter a valid mobile number");
            return false
        }
        setTimeout(function () {
            // swal("Nice!", "You wrote: " + inputValue, "success");
            $.post(ajaxUrl,{'id':voteID, 'mobile': inputValue})
            .done(function(data){
                console.log(data.type);
                switch (data.type){
                    case 'success':
                        swal("Thanks!", "Voting Success", "success");
                        break; 
                    case 'validation':
                        alert("Please Enter a valid mobile number");
                        // swal("Error!","Please Enter a valid mobile number", 'error');
                        EnterMobile(voteID, ajaxUrl, 'Please Enter a valid mobile number');
                        // return false
                        // swal("Opps!", data.message, "warning");
                        break;
                    case 'otp':
                        EnterOTP(voteID, inputValue, ajaxUrl);
                        break;
                    case 'error':
                        swal("Oops!!", "Something went wrong", "error");
                        break;
                    case 'time-expire':
                        swal({
                            title:"Sorry!", 
                            text:"Voting Time Expired.", 
                            // type:"error",
                            imageUrl:'web-assets/sad-emo.png'
                        });
                        break;
                    default:
                        swal("Sorry!", "Unable to understand", "warning");
                        break
                }
                console.log(data);
            }).fail(function(){
                swal("Oops!!", "Something went wrong", "error");
            });
        }, 2000);
        // swal("Nice!", "You wrote: " + inputValue, "success");
    });
}
EnterOTP = function(voteID, mobileNO, ajaxUrl, otpMsg = null){
    var msg = "Enter the OTP:";
    if(otpMsg !== null){
        $msg = otpMsg;
    }
    swal({
        title: "OTP Verification",
        text: msg,
        type: "input",
        showCancelButton: true,
        closeOnConfirm: false,
        inputPlaceholder: "OTP",
        showLoaderOnConfirm: true,
        showLoaderOnCancel: true,
        cancelButtonText: "Resend OTP",
        closeOnCancel: false
    }, function (inputValue) {
        if (inputValue === false) {
            // swal("Oops!!", "Please Verify OTP", "info",function(){
            // EnterOTP(voteID, mobileNO, ajaxUrl);
            // });
            setTimeout(function () {
                // alert("otp resent to your mobile.");
                swal({
                    title: "OTP",
                    text: "OTP Successfully Resent to your mobile",
                    type: "info",
                    confirmButtonClass: "btn-info",
                    closeOnConfirm: false,
                },function(){
                    setTimeout(function () {
                        EnterOTP(voteID, mobileNO, ajaxUrl);
                    }, 1000);
                })
            },2000);
        }else{
            inputValue = inputValue.trim();
            if (inputValue === "") {
                swal.showInputError("OTP");
                return false;
            }
            console.log(typeof(inputValue))
            setTimeout(function () {
                // swal("Nice!", "You wrote: " + inputValue, "success");
                $.post(ajaxUrl,{'id':voteID, 'mobile': inputValue, 'otp':inputValue})
                .done(function(data){
                    console.log(data.type);
                    switch (data.type){
                        case 'success':
                            swal("Thanks!", "Voting Success", "success");
                            break; 
                        case 'otp-error':
                            EnterOTP(voteID, inputValue, ajaxUrl);
                            // return false
                            // swal("Opps!", data.message, "warning");
                            break;
                        case 'otp':
                            EnterOTP(voteID, mobileNO, ajaxUrl);
                            break;
                        case 'error':
                            swal("Oops!!", "Something went wrong", "error");
                            break;
                        case 'time-expire':
                            swal({
                                title:"Sorry!", 
                                text:"Voting Time Expired.", 
                                // type:"error",
                                imageUrl:'web-assets/sad-emo.png'
                            });
                            break;
                        default:
                            swal("Sorry!", "Unable to understand", "warning");
                            break
                    }
                    console.log(data);
                }).fail(function(){
                    swal("Oops!!", "Something went wrong", "error");
                });
            }, 2000);
        }
    });
}