(function($){
    $(function(){
        $('#organization_url').change(function(){
            var $this = $('#organization_url');
            $.ajax({
                url: BASE_URL + 'ajax/check_permalink',
                type: 'POST',
                data: {action: DOING_AJAX, permalink: $this.val()},
                success: function(response){
                    if(response == 'unique'){
                        $this.parent().removeClass().addClass('col-sm-3 has-success has-feedback');
                        $this.siblings('span').remove();
                        $this.parent().append('<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span><span id="inputSuccess2Status" class="sr-only">(success)</span>');
                        $('#not-unique').hide();
                    }else if(response = 'exists'){
                        $this.parent().removeClass().addClass('col-sm-3 has-error has-feedback');
                        $this.siblings('span').remove();
                        $this.parent().append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span><span id="inputError2Status" class="sr-only">(error)</span>');
                        $('#not-unique').show();
                    }
                }
            });
        });        
        
        $('[data-toggle="tooltip"]').tooltip();
        
        $(document).delegate('.remove-data', 'click', function(){
            var element = $(this).data('parent');
            $(element).remove();
        });
    });
})(jQuery);