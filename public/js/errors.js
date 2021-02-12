
function showErrors(error) {
    var has_err = false;
    if(error.responseJSON.errors){
        var dataKeys = Object.keys(error.responseJSON.errors);
        var dataValues = Object.values(error.responseJSON.errors);
        for (let index = 0; index < dataKeys.length; index++) {
            has_err = true;
            $('#err-'+dataKeys[index])
                .text(dataValues[index])
                .removeClass('hidden');
            $.notify(
                {
                    icon: 'flaticon-hands-1',
                    title: dataValues[index],
                    message: '',
                },{
                type: 'warning',
                placement: {
                    from: "bottom",
                    align: "right"
                },
                time: 1000,
            });
        }           
    }
    if(!has_err){
        $.notify(
            {
                icon: 'flaticon-hands-1',
                title: error.responseJSON.message,
                message: '',
            },{
            type: 'warning',
            placement: {
                from: "bottom",
                align: "right"
            },
            time: 1000,
        });
    }
}