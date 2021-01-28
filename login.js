window.onload = function () {
    document.getElementById("text1").onfocus = function () {
        document.getElementById("l_text1").style.color = '#1B73BA';
    };
    document.getElementById("text1").onblur = function () {
        document.getElementById("l_text1").style.color = '';
    };

    document.getElementById("text2").onfocus = function () {
        document.getElementById("l_text2").style.color = '#1B73BA';
    };
    document.getElementById("text2").onblur = function () {
        document.getElementById("l_text2").style.color = '';
    };
}