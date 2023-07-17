<?php 
  include "Conn.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form</title>

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
      crossorigin="anonymous"
    />



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
        
    <script type="text/javascript">
        
        //Reg Ex Declaration - Globaly.
        var $FNameLNameRegEx = /^([a-zA-Z]{2,20})$/;
        var $FullNameRegEx = /^([a-zA-Z ]{2,40})$/;
        var $BankAccountNameRegEx = /^([a-zA-Z ]{2,60})$/;
        var $PasswordRegEx = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,12}$/;

        var $EmailIdRegEx = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,8}\b$/i;
        var $ConNoRegEx = /^([0-9]{10})$/;
        var $AgeRegEx = /^([0-9]{1,2})$/;
        var $AadhaarNoRegEx = /^([0-9]{12})$/;
        var $GSTNoRegEx=/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/;
        var $IndianDrivingLicenseNoRegEx = /^([A-Z]{2,3}[-/0-9]{8,13})$/;
        var $IndianVehicleRegNoRegEx = /^([A-Z]{2}[0-9]{1,2}[A-Z]{1,3}[0-9]{1,4})$/;
        var $PincodeRegEx = /^[1-9][0-9]{5,6}$/;
        var $PANNoRegEx = /^[A-Z]{3}[ABCFGHLJPT][A-Z][0-9]{4}[A-Z]$/;
        var $IFSCCodeRegEx = /^[A-Za-z]{4}0[A-Z0-9a-z]{6}$/;
        var $BankAccountNoRegEx = /^([0-9]{9,18})$/;
        var $LatitudeLongitude=/^(-?(?:1[0-7]|[1-9])?\d(?:\.\d{1,8})?|180(?:\.0{1,8})?)$/;
        
        $(document).ready(function(){

            $("#TxtFirstname").blur(function(){
                $("#TxtNameValidation").empty();
                if($(this).val()=="" || $(this).val()==null){
                    $("#TxtNameValidation").html("(*) Name required..!!");
                }
                else{
                    if(!$(this).val().match($FullNameRegEx)){
                        $("#TxtNameValidation").html("(*) Invalid name..!!");
                    }
                }
            });

            $("#TxtFirstname").keypress(function(e){
                $("#TxtNameValidation").empty();
                var Flag=((e.which>=65 && e.which<=90) || (e.which>=97 && e.which<=121));
                if(Flag==false){
                    $("#TxtNameValidation").html("Invalid Input..!!");
                }
                return Flag;
            });

            

            

            

            $("#TxtContactNo").blur(function(){
                $("#TxtContactNoValidation").empty();
                if($(this).val()=="" || $(this).val()==null){
                    $("#TxtContactNoValidation").html("(*) Contact no. required..!!");
                }
                else{
                    if(!$(this).val().match($ConNoRegEx)){
                        $("#TxtContactNoValidation").html("(*) Invalid contact no..!!");
                    }
                }
            });

            $("#TxtContactNo").keypress(function(e){
                $("#TxtContactNoValidation").empty();
                var Flag=(e.which>=48 && e.which<=57);
                if(Flag==false){
                    $("#TxtContactNoValidation").html("Invalid Input..!!");
                }
                return Flag;
            });


            $("#TxtEmailid").blur(function(){
                $("#TxtEmailIdValidation").empty();
                if($(this).val()=="" || $(this).val()==null){
                    $("#TxtEmailIdValidation").html("(*) Email id required..!!");
                }
                else{
                    if(!$(this).val().match($EmailIdRegEx)){
                        $("#TxtEmailIdValidation").html("(*) Invalid email id..!!");
                    }
                }
            });

            $("#TxtContactMsg").blur(function(){
                $("#TxtContactMsgValidation").empty();
                if($(this).val()=="" || $(this).val()==null){
                    $("#TxtContactMsgValidation").html("(*) Contact message required..!!");
                }
                else{
                    if($("#TxtContactMsg").val().length>300){
                        $("#TxtContactMsgValidation").html("(*) Invalid contact message..!!");
                    }
                }
            });

            var TxtNameFlag=false,TxtContactNoFlag=false,TxtEmailIdFlag=false,TxtContactMsgFlag=false;

            $("#BtnSubmit").click(function(){
                $("#TxtNameValidation").empty();
                if($("#TxtName").val()=="" || $("#TxtName").val()==null){
                    $("#TxtNameValidation").html("(*) Name required..!!");
                    TxtNameFlag=false;
                }
                else{
                    if(!$("#TxtName").val().match($FullNameRegEx)){
                        $("#TxtNameValidation").html("(*) Invalid name..!!");
                        TxtNameFlag=false;
                    }
                    else{
                        TxtNameFlag=true;
                    }
                }
                $("#TxtContactNoValidation").empty();
                if($("#TxtContactNo").val()=="" || $("#TxtContactNo").val()==null){
                    $("#TxtContactNoValidation").html("(*) Contact no. required..!!");
                    TxtContactNoFlag=false;
                }
                else{
                    if(!$("#TxtContactNo").val().match($ConNoRegEx)){
                        $("#TxtContactNoValidation").html("(*) Invalid contact no..!!");
                        TxtContactNoFlag=false;
                    }
                    else{
                        TxtContactNoFlag=true;
                    }
                }
                $("#TxtEmailIdValidation").empty();
                if($("#TxtEmailId").val()=="" || $("#TxtEmailId").val()==null){
                    $("#TxtEmailIdValidation").html("(*) Email id required..!!");
                    TxtEmailIdFlag=false;
                }
                else{
                    if(!$("#TxtEmailId").val().match($EmailIdRegEx)){
                        $("#TxtEmailIdValidation").html("(*) Invalid email id..!!");
                        TxtEmailIdFlag=false;
                    }
                    else{
                        TxtEmailIdFlag=true;
                    }
                }
                $("#TxtContactMsgValidation").empty();
                if($("#TxtContactMsg").val()=="" || $("#TxtContactMsg").val()==null){
                    $("#TxtContactMsgValidation").html("(*) Contact message required..!!");
                    TxtContactMsgFlag=false;
                }
                else{
                    if($("#TxtContactMsg").val().length>300){
                        $("#TxtContactMsgValidation").html("(*) Invalid contact message..!!");
                        TxtContactMsgFlag=false;
                    }
                    else{
                        TxtContactMsgFlag=true;
                    }
                }
                if(TxtNameFlag==true && TxtContactNoFlag==true && TxtEmailIdFlag==true && TxtContactMsgFlag==true){
                    $("input,textarea").val("");
                    alert("Form submitted successfully..!!");
                }
                else{
                    alert("Invalid Input..!!");
                }
            });

        });
        
    </script>
    <style type="text/css">
      #CNAForm {
        box-shadow: 0px 0px 3px Gray;
        margin-top: 40px;
        margin-bottom: 40px;
        color: coral;
      }

      i.fa,
      b {
        color: brown;
      }
    </style>
  </head>

<body>
      <form action="">
        <div class="container">
          <div class="row">
            <div
              class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4 col-lg-offset-4 col-lg-4"
              id="CNAForm"
            >
              <h3 class="text-center">
                <i class="fa fa-users"></i>Create New Account
                <hr />
              </h3>
              <div class="form-group">
                <b>Name:</b>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input
                    type=" text"
                    id="TxtFirstname"
                    placeholder="Enter Name here.."
                    maxlength="20"
                    name="Name"
                    class="form-control"
                  />
                  <small id="TxtNameValidation"></small>
                </div>
              </div>
              <div class="form-group">
                <b>Email id:</b>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input
                    type=" text"
                    id="TxtEmailid"
                    placeholder="Enter Email id here.."
                    maxlength="50"
                    name="Email"
                    class="form-control"
                  />
                  <small id="TxtEmailIdValidation"></small>
                </div>
              </div>
              <div class="form-group">
                <b><i class="fa fa-envelope"></i> Feedback:</b>
                <div class="input-group">
                  
                  <textarea name="Message" id="TxtContactMsg" cols="47" rows="5" style=" color: black; "></textarea>
                  
            <small id="TxtContactMsgValidation"></small>
                </div>
              </div>
              <div class="form-group">
                <a class="btn btn-primary" id="BtnCreateNewAccount"
                  ><i style="color:brown" class="fa fa-user-plus"></i><button name="submit" type="submit" style=" background-color: transparent; border: 1px; border-color: transparent;">Submit</button></a
                >
              </div>
            </div>
          </div>
        </div>
      </form>

      <?php

        if (isset($_REQUEST['submit'])) {
          
          $ins="insert into feedback values('".$_REQUEST['Name']."','".$_REQUEST['Email']."','".$_REQUEST['Message']."')";

          $ex=$conn->query($ins);

          if($ex)
          {
            echo '<script>alert("Thanks For Your Feedback")</script>';
          }
          else{

            echo "Sorryy";
          }
        }
  
  
  
  ?>
</body>
</html>