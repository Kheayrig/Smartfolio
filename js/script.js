export function deleteCookie(){
    document.cookie = "key= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
    window.location.href = "./index.php";
}