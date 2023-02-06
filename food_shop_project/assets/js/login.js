window.onload = function () {   // 화면을 다 그리고나서 
  //TODO 아이디 저장
  let remember = getCookie("remember");
  let id = document.querySelector('input[name="user_id"]');
  let rememberme = document.querySelector('input[name="user_accept"]');
  id.value = remember;

  if (id.value != "") {
    //? 로딩시 입력 칸에 저장된 id표시된 상태라면 id저장
    rememberme.checked = true;
  }
};


/**
 * ! onchange event   
 * @param {checkbox element} node  
 */
function set_remember(node) {
  const id = document.querySelector('input[name="user_id"]');
  if (node.checked) {
    set_cookie("remember", id.value, 7);
  } else {
    deleteCookie("remember");
  }
}

/**
 * ! 저장하기를 체크한 상태에서 id 입력하는 경우
 * @param {element} node
 */
function set_remember2(node) {
  const rememberme = document.querySelector('input[name="user_accept"]');
  if (rememberme.checked) {
    set_cookie("remember", node.value, 7);
  }
}

/**
 * ! 쿠키세팅
 * @param {String} name 쿠키네임 remember   
 * @param {String} value 아이디
 * @param {Number} exp 7
 */
function set_cookie(name, value, exp) {
  let date = new Date();
  date.setTime(date.getTime() + exp * 24 * 60 * 60 * 1000); //1일보관
  document.cookie =
    name + "=" + value + ";expires=" + date.toUTCString() + ";path=/";
}

/**
 * !쿠키얻기
 * @param {String} name 쿠키이름 
 * @returns
 */
function getCookie(name) {
  var value = document.cookie
    .split("; ")
    .find((row) => row?.split("=")[0] === name);
  return value != undefined ? value.split("=")[1] : null;
}

/**
 * !쿠키삭제
 * @param {String} name  쿠키이름 
 */
//TODO 쿠키삭제
function deleteCookie(name) {
  document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:01 GMT;path=/";
}
/**
 * ! 비밀번호 찾기
 */
// function find_paswword() {
//   let email = document.querySelector('input[name="email"]');
//   let p_tag = document.querySelector("#email_check_div p");
//   const regExp = new RegExp(
//     /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i
//   );
//   if (!regExp.test(email.value.trim())) {
//     alert("이메일 형식에 맞게 작성해주세요.");
//   } else {
//     const data = new FormData();
//     data.append("email", email.value);
//     fetch("/main/find_password", {
//       method: "POST",
//       mode: "cors",
//       body: data,
//       headers: {
//         Accept: "application/json",
//       },
//     })
//       .then((res) => {
//         return res.json();
//       })
//       .then((json) => {
//         if (json !== "x") {
//           console.log(json);
//           document.querySelector("#email_check_div").innerHTML =
//             "<p>인증된 이메일 주소로 <br />임시 비밀번호를 전송하였습니다.</p>";
//           document.querySelector("#find_pw_foot").innerHTML =
//             '<button type="button" class="btn_basic type_primary" onclick="location.reload()">확인</button>';
//           console.log(json);
//         } else {
//           p_tag.innerHTML =
//             '<strong class="wrong">등록되지 않은 이메일 주소</strong>입니다. 이메일 주소를 다시 확인해주세요.';
//         }
//       })
//       .catch((e) => {
//         console.log(e);
//       });
//   }
// }