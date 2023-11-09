
 let add1 = document.getElementById('add1');
 let tmp;      
 let mood; 
 let users ;

 if (localStorage.userz != null){
    users =JSON.parse(localStorage.userz);
    show();
 }
 else{
        users = [];
        
 }
           
       
           
function add(){
    
    var name1 = document.getElementById('name1').value;
    var email1 = document.getElementById('email1').value;
    var phone1 = document.getElementById('phone1').value;
    var password1 = document.getElementById('password1').value;

    var user = {};
    user.name = name1;
    user.email = email1;
    user.phone = phone1;
    user.password = password1;
    if(user.name != '' && user.email != '' && user.phone != '' && user.password != '' ){
    if(mood !== 'update'){
    users.push(user); 
    localStorage.setItem('userz',JSON.stringify(users));
    console.log(users);
    
    }
    else{
    users[tmp] =user;
    mood='create';
    add1.innerHTML ='create';    

    }
    clear();
    show();
    }
    
    
}


function clear(){
    name1.value = '';
    email1.value = '';
    phone1.value = '';
    password1.value = '';

}

function show(){
    let table1 ='';
    for(var i=0; i<users.length; i++){
        table1 +=`

        <tr>
            <td>${users[i].name}</td>
            <td>${users[i].email}</td>
            <td>${users[i].phone}</td>
            <td>${users[i].password}</td>
            <td class="text-right">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-sm btn-secondary" id="Edit" onclick="editdata(${i})" >Edit</button>
                        <form action="" method="POST">
                            <button type="button" class="btn btn-sm btn-danger  id="Delete" onclick="deletedata(${i})" >Delete</button>
                        </form>
                    </div>
                </td>



        </tr>
        `
        document.getElementById('tbody').innerHTML = table1;

}
}

function deletedata(i){
   
    users.splice(i,1);
    localStorage.userz =JSON.stringify(users);
    
    show();
}


function editdata(i){
    name1.value = users[i].name;
    email1.value = users[i].email;
    phone1.value = users[i].phone;
    password1.value = users[i].password;
    add1.innerHTML ='update';
    mood ='update';
    tmp=i;
    

}

function login(){
    var userNameIn3 = document.getElementById('in3').value;
    var passwordIn4 = document.getElementById('in4').value;
    if(userNameIn3==''){
document.getElementById('s2').innerHTML = "email must be filled out";
        return false;
    }else if(passwordIn4==''){
document.getElementById('s2').innerHTML = "password must be filled out";
        return false;
    }
    for(var i=0;i<users.length;i++){
if(userNameIn3==users[i].email  && passwordIn4==users[i].password){   
                return true;
            }
    }
document.getElementById('s2').innerHTML = "password and username do not match";
    return false;
    }


function showPass(){

     var passValue = document.getElementById('in4');
     if(passValue.type == 'text'){
        passValue.type = 'password';
     }else if(passValue.type == 'password'){
        passValue.type = 'text';
     }
    }
