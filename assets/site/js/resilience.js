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
                        $('#add_org').removeAttr('disabled');
                    }else if(response = 'exists'){
                        $this.parent().removeClass().addClass('col-sm-3 has-error has-feedback');
                        $this.siblings('span').remove();
                        $this.parent().append('<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span><span id="inputError2Status" class="sr-only">(error)</span>');
                        $('#not-unique').show();
                        $('#add_org').attr('disabled', 'disabled');
                    }
                }
            });
        });        
        
        $('[data-toggle="tooltip"]').tooltip();
        
        $(document).delegate('.remove-data', 'click', function(){
            var element = $(this).data('parent');
            $(element).remove();
        });
        
        $( "#tabs" ).tabs();
        
        $(document).delegate('form#surveyFrm .prev', 'click', function(){
            var question = $(this).data('question');
            $('div.frm').hide('fast');
            $('div#'+question+'').show('slow');
        });
        
        $(document).delegate('form#surveyFrm .next', 'click', function(){
            var question = $(this).data('question');
            var current = $(this).data('current');
            if($('input[type=radio][name=answer_' + current + ']').is(':checked') == false){
                $('#surveyWarningModal').modal();     
                return false;
            }
            $('div.frm').hide('fast');
            $('div#'+question+'').show('slow');
        });
        
        $('#review-btn').click(function(){
            var current = $(this).data('current');
            if($('input[type=radio][name=answer_' + current + ']').is(':checked') == false){
                $('#surveyWarningModal').modal(); 
                return false;
            }
            $('.review-box').hide('fast');
            $('#submit-box').show('slow');
            $('div.frm').show('slow');
        });
        
        $('#page_slug').bind('focus',function(){
            var title = $('#page_title').val();
            title = title.replace(/[&\/\\#,+()@_$~%.'":*?<>{}]/g, '');
            title = title.replace(/[, ]+/g, ' ').trim();
            var words = title.split(' ');
            var str = words.join('-');
            $(this).val(str.toLowerCase());
        });
        
        $('#videoModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var title = button.data('title');
            var url = button.data('url');
            var modal = $(this);
            modal.find('iframe').attr('src', url);
            modal.find('.modal-title').text(title);
        });
        
        $('#page-box-jpages').jPages({
            containerID : "page-box", 
            perPage: EMPLOYEE_SIDEBAR_PAR_PAGE_ITEM,
            links: "blank",
            previous: "←",
            next: "→"
        }); 
        $('#video-box-jpages').jPages({
            containerID : "video-box", 
            perPage: EMPLOYEE_SIDEBAR_PAR_PAGE_ITEM,
            links: "blank",
            previous: "←",
            next: "→"
        }); 
        $('#doc-box-jpages').jPages({
            containerID : "doc-box", 
            perPage: EMPLOYEE_SIDEBAR_PAR_PAGE_ITEM,
            links: "blank",
            previous: "←",
            next: "→"
        }); 
        $('#report-box-jpages').jPages({
            containerID : "report-box", 
            perPage: EMPLOYEE_SIDEBAR_PAR_PAGE_ITEM,
            links: "blank",
            previous: "←",
            next: "→"
        }); 
    });
})(jQuery);