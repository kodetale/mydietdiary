function edit_check(){
    
  const password = document.editform.password;
  const password_ch = document.editform.password_ch;
  const name = document.editform.name;
  
  if (password.value) {
    if(password.value.length < 6 || password.value.length > 20){
      var err_txt = document.querySelector(".err_password");
      err_txt.textContent = "비밀번호는 6자 이상 20자 이하로 입력해주세요.";
      password.focus();
      return false;
    };
  };

  if(password.value){
    if(password.value != password_ch.value){
      var err_txt = document.querySelector(".err_password_ch");
      err_txt.textContent = "비밀번호가 다릅니다. 다시 입력해주세요.";
      password_ch.focus();
      return false;
    };
  };

  if(name.value){
    if(name.value.length > 8){
      var err_txt = document.querySelector(".err_name");
      err_txt.textContent = "이름은 8자 이하로 입력해주세요.";
      name.focus();
      return false;
    };
  };

};


