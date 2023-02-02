const sendit = () => {
  const id = document.joinform.id;
  const password = document.joinform.password;
  const password_ch = document.joinform.password_ch;
  const name = document.joinform.name;

  if (id.value == "") {
    action_popup.alert("아이디를 입력해주세요.");
    id.focus();
    return false;
  }

  if (id.value.length < 4 || id.value.length > 12) {
    action_popup.alert("아이디는 4자 이상 12자 이하로 입력해주세요.");
    id.focus();
    return false;
  }

  const expIDText = /[a-zA-z0-9]+$/;
  if (!expIDText.test(id.value)) {
    action_popup.alert("아이디는 영문과 숫자만 사용할 수 있습니다.");
    id.focus();
    return false;
  }

  if (password.value == "") {
    action_popup.alert("비밀번호를 입력해주세요.");
    password.focus();
    return false;
  }

  if (password_ch.value == "") {
    action_popup.alert("비밀번호 확인을 입력해주세요.");
    password_ch.focus();
    return false;
  }

  if (password.value.length < 6 || password.value.length > 20) {
    action_popup.alert("비밀번호는 6자 이상 20자 이하로 입력해주세요.");
    password.focus();
    return false;
  }

  if (password.value != password_ch.value) {
    action_popup.alert("비밀번호가 다릅니다. 다시 입력해주세요.");
    password_ch.focus();
    return false;

  }
  if (name.value == "") {
    action_popup.alert("이름을 입력해주세요.");
    name.focus();
    return false;
  }

  if (name.value.length > 8) {
    action_popup.alert("이름은 8자 이하로 입력해주세요.");
    name.focus();
    return false;
  }

  return true;
};

const checkId = () => {
  const id = document.joinform.id;
  const result = document.querySelector("#result");

  if (id.value == "") {
    action_popup.alert("아이디를 입력해주세요.");
    id.focus();
    return false;
  }

  if (id.value.length < 4 || id.value.length > 12) {
    action_popup.alert("아이디는 4자 이상 12자 이하로 입력해주세요.");
    id.focus();
    return false;
  }

  const xhr = new XMLHttpRequest();
  xhr.onreadystatechange = () => {
    if (xhr.readyState == XMLHttpRequest.DONE) {
      if (xhr.status == 200) {
        let txt = xhr.responseText.trim();
        if (txt == "O") {
          result.style.display = "block";
          result.style.color = "green";
          result.innerHTML = "사용할 수 있는 아이디입니다.";
        } else {
          result.style.display = "block";
          result.style.color = "#FF5576";
          result.innerHTML = "중복된 아이디입니다.";
          id.focus();
          // 키 입력 시 result 숨김 이벤트
          id.addEventListener("keydown", function () {
            result.style.display = "none";
          });
        }
      }
    }
  };
  xhr.open("GET", "checkId_ok.php?id=" + id.value, true);
  xhr.send();
};
