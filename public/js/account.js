$(document).ready(function(){
  $('#delete-account').click(function(){
    var csrf_token = $('#delete-account').attr('data-token');
    bootstrapConfirmDialog(csrf_token);
    return false;
  });
});

function bootstrapConfirmDialog(token){
  BootstrapDialog.confirm({
    title: 'Delete Account',
    message: 'Are you sure you want your account to be deleted',
    type: BootstrapDialog.TYPE_DANGER,
    closable: true,
    draggable: true,
    btnOKLabel: 'Proceed',
    btnCancelLabel: 'Cancel',
    btnOKClass: 'btn-danger',
    callback: function(result) {
        if(result) {
            deleteAccount(token);
        }
      }
  });
}

function deleteAccount(token){
  $.ajax({
    url: '/deleteaccount',
    type: 'post',
    data: {_method: 'delete', _token :token},
    success: function(data){
      requestResponse(data);
    }
  });
}

function requestResponse(data){
  if(data == 'done') {
    window.location.href = '/';
  } else {
    BootstrapDialog.show({
      message: "Something went wrong, couldn't delete!",
      title: 'Oops!',
      type: BootstrapDialog.TYPE_WARNING
    });
  }
}
