const sendit = () => {
  // Input들을 각각 변수에 대입
  const id = document.joinform.id;
  const password = document.joinform.password;
  const password_ch = document.joinform.password_ch;
  const name = document.joinform.name;

  // id값이 비어있으면 실행.
  if (id.value == "") {
    alert("아이디를 입력해주세요.");
    id.focus();
    return false;
  }
  // id값이 4자 이상 12자 이하를 벗어나면 실행.
  if (id.value.length < 4 || id.value.length > 12) {
    alert("아이디는 4자 이상 12자 이하로 입력해주세요.");
    id.focus();
    return false;
  }

  // id 형식 정규식
  const expIDText = /[a-zA-z0-9]+$/;
  if (!expIDText.test(id.value)) {
    alert("아이디는 영문과 숫자만 사용할 수 있습니다.");
    id.focus();
    return false;
  }

  // password값이 비어있으면 실행.
  if (password.value == "") {
    alert("비밀번호를 입력해주세요.");
    password.focus();
    return false;
  }
  // password_ch값이 비어있으면 실행.
  if (password_ch.value == "") {
    alert("비밀번호 확인을 입력해주세요.");
    password_ch.focus();
    return false;
  }
  // password값이 6자 이상 20자 이하를 벗어나면 실행.
  if (password.value.length < 6 || password.value.length > 20) {
    alert("비밀번호는 6자 이상 20자 이하로 입력해주세요.");
    password.focus();
    return false;
  }
  // password값과 password_ch값이 다르면 실행.
  if (password.value != password_ch.value) {
    alert("비밀번호가 다릅니다. 다시 입력해주세요.");
    password_ch.focus();
    return false;
  }
  // name값이 비어있으면 실행.
  if (name.value == "") {
    alert("이름을 입력해주세요.");
    name.focus();
    return false;
  }

  // id값이 4자 이상 12자 이하를 벗어나면 실행.
  if (name.value.length > 8) {
    alert("이름은 8자 이하로 입력해주세요.");
    name.focus();
    return false;
  }

  // 유효성 검사 정상 통과 시 true 리턴 후 form 제출.
  return true;
};

const checkId = () => {
  // id, result 변수에 대입
  const id = document.joinform.id;
  const result = document.querySelector("#result");

  // 중복체크 시에 한번 더 id 입력값 체크
  if (id.value == "") {
    alert("아이디를 입력해주세요.");
    id.focus();
    return false;
  }

  if (id.value.length < 4 || id.value.length > 12) {
    alert("아이디는 4자 이상 12자 이하로 입력해주세요.");
    id.focus();
    return false;
  }

  // Ajax를 사용한 아이디 중복 체크
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
