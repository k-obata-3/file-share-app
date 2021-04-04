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


});
