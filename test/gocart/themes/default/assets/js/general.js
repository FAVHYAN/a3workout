function readURL(params) {
    if ( (params['elem']).files && (params['elem']).files[0] ) {
        var reader = new FileReader();
        var f = (params['elem']).files[0];
        reader.onload = function (e) {
          var spl_type = (f.type).split('/');
          switch( spl_type[0] ){
            case 'image':
              if( params['cover'] == 'image'){
                $(params['preview']).attr('src', e.target.result);
              }else if( params['cover'] == 'background-image') $(params['preview']).css('background-image', 'url('+ e.target.result +')');
            break;
          }
        }

        reader.readAsDataURL(params['elem'].files[0]);
    }
}