$(document).ready( function() {
            var keynow = '';

            $('input').keydown(function(e){
                
                if(e.which==13){ 
                    if( $(this).prop("tagName")=="INPUT" ) e.preventDefault();
                };
                
                // # $ F5 ; ' " / \ | = + * { } ? [ ] 
                if( e.key=='#' || e.key=='$' || e.which==116 || e.key==';' || e.which==187 || e.which=='*' || e.which==106 || e.which==107 || e.which==111 || e.which==220 || e.key=="'" || e.key=='"' || (e.shiftKey && e.which==191) || (e.shiftKey && e.which==219) || (e.shiftKey && e.which==221)  || e.key=='<' || e.key=='>' || (e.key=='[') || (e.key==']') || e.key=='\(' || e.key=='\)' ) {
                    e.preventDefault();
                    $('#temperr').remove();
                    $("#msgbox").append('<div id="temperr" class="error_msg_inputs text-center">Please Don\'t use ->( ' + e.key + ' )</div>');
                }
                else{ $('#temperr').remove(); }
                
                //$(this).val( e.which ) //Show Key
            });
            $('input').bind("cut copy paste", function(e) {
                e.preventDefault();
                 //alert("You cannot paste into this text field.");
                 $('#temperr').remove();
                 $("#msgbox").append('<div id="temperr" class="error_msg_inputs">You cannot (Cut/Copy/Paste) into this text field</div>');
                 var pastedData = "";
                     $(this).val(pastedData);
                 
            });
            
            $('textarea').keydown(function(e){
                
                if(e.which==13){ 
                    if( $(this).prop("tagName")=="INPUT" ) e.preventDefault();
                };
                
                // # $ F5 ; ' " / \ | = + * { } ? [ ] 
                if( e.key=='#' || e.key=='$' || e.which==116 || e.key==';' || e.which==187 || e.which=='*' || e.which==106 || e.which==107 || e.which==111 || e.which==220 || e.key=="'" || e.key=='"' || (e.shiftKey && e.which==191) || (e.shiftKey && e.which==219) || (e.shiftKey && e.which==221)  || e.key=='<' || e.key=='>' || (e.key=='[') || (e.key==']') || e.key=='\(' || e.key=='\)' ) {
                    e.preventDefault();
                    $('#temperr').remove();
                    $("#msgbox").append('<div id="temperr" class="error_msg_inputs" >Please Don\'t use ->( ' + e.key + ')</div>');
                }
                else{ $('#temperr').remove(); }
                
                //$(this).val( e.which ) //Show Key
            });
   
        $("#sub").click(function(){
            var name  = $("#name").val();
            var email = $("#email").val();
            var pass  = $("#pass").val();
            var cpass = $("#cpass").val();

            //$(this).val().length === 0 

            if (name === '' || email === '' || pass === '' || cpass === '') {

            }else{

                $("#result").show();
        
            }

      });

      //-----------------

            
});