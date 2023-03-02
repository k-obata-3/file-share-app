$(document).ready(function()
{
    // 全選択ボタンクリック
    $('#slected-btn').on('click', function()
    {
        var isChecked = false;
        if ($(':checkbox:checked').length != $(':checkbox').length)
        {
            isChecked = true;
        }

        $(':checkbox').prop('checked', isChecked);
    });

    // ログアウト
    $('#conf-modal #modal-yes').on('click', function()
    {
        location.href = 'logout.php';
    });

    //送信ボタンをクリック
    $('#send').click(function()
    {
        //POSTメソッドで送るデータを定義する
        //var data = {パラメータ : 値};
        var data = {request : $('#request').val()};

        //Ajax通信メソッド
        //type : HTTP通信の種類(POSTとかGETとか)
        //url  : リクエスト送信先のURL
        //data : サーバに送信する値
        $.ajax(
        {
            type: "POST",
            url: "fileDownloader.php",
            data: data,
            //Ajax通信が成功した場合に呼び出されるメソッド
            success: function(data, dataType){
                //デバッグ用 アラートとコンソール
                alert(data);
                console.log(data);

                //出力する部分
                $('#result').html(data);
            },
            //Ajax通信が失敗した場合に呼び出されるメソッド
            error: function(XMLHttpRequest, textStatus, errorThrown)
            {
                alert('Error : ' + errorThrown);
                $("#XMLHttpRequest").html("XMLHttpRequest : " + XMLHttpRequest.status);
                $("#textStatus").html("textStatus : " + textStatus);
                $("#errorThrown").html("errorThrown : " + errorThrown);
            }
        });
        return false;
    });
});

function showFieldError(field, msg) {
  var fieldErrorEl = field.next();
  var errorMsgEl = `<p class="field_error_msg">${msg}</p>`
  if(!fieldErrorEl.length) {
    $(errorMsgEl).insertAfter(field);
  }
}

function hideAllFieldError() {
  $('.field_error_msg').remove();
  $('.global_error_msg').html('');
}
