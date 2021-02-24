$(document).ready(()=>{
    // register script
    $('#reg-btn').click((e)=>{
        if($('#register-form')[0].checkValidity()){
            e.preventDefault()
            $('#reg-btn').val("Please wait...")
            if($('#reg-pwd').val() != $('#reg-Cpwd').val()){
                $('#passMsg').text('Passwords do not match')
                $('#reg-btn').val("Sign up")
            }else{
                $('#passMsg').text('')
                $.ajax({
                    url:'inc/signupController.php',
                    method:'post',
                    data: $('#register-form').serialize()+'&action=register',
                    success:function(res){
                        $('#reg-btn').val("Sign up")
                        console.log(res);
                        if(res === "registered"){
                            swal.fire({
                            title:'User Created Successfully',
                            icon:"success",
                        }).then(function(){
                            window.location = 'index.php'
                        })
                        }else{
                            $('#regMsg').html(res)
                        }
                    }
                })
            }
        }
    })

    // login script
    $('#login-btn').click((e)=>{
        
        if($("#login-form")[0].checkValidity()){
            e.preventDefault()
            $("#login-btn").val('Please Wait...')
            $.ajax({
                url:'inc/loginController.php',
                method:"post",
                data:$("#login-form").serialize() + '&action=login',
                success:function(res){
                    $("#login-btn").val('Sign in')
                    console.log(res);
                   if(res === "login"){
                        swal.fire({
                        title:'Login Successfully',
                        icon:"success",
                    }).then(function(){
                         window.location = 'index.php'
                    })
                   }else{
                       $("#loginAlert").html(res)
                   }
                }
            })
        }
    })


     // Create New Post script
    $('#addPostBtn').click(e=>{
        
        if($('#add-post-form')[0].checkValidity()){
            e.preventDefault()
            $('#addPostBtn').val('Please wait...')
            var image = $('#image')[0].files;
            var title = $('#title').val()
            var body = $('#body').val()

            const fd = new FormData()
            fd.append('image',image[0])
            fd.append('title',title)
            fd.append('body',body)
            
            $.ajax({
                url:'inc/process.php',
                method:'post',
                data:fd,
                contentType: false,
                processData: false,
                success:function(res){
                    $('#add-post-form')[0].reset()
                    $('#addPostBtn').val('Create Post')
                    swal.fire({
                        title:'Post Added Successfully',
                        icon:"success",
                    }).then(function(){
                         window.location.href = 'home.php'
                    })
                   
                }
            })
        }
    })
    
})