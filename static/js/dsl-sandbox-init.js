$(function(){
    var dslEditor = ace.edit("dsl-editor");
    window.dslEditor = dslEditor;
    window.dslEditor.setReadOnly(true);

    var editor = ace.edit("php-editor");
    editor.getSession().setMode("ace/mode/php");
    window.phpEditor = editor;

    $(window).resize(function() {
        $('#php-editor,#dsl-editor').each(function() {
            $(this).width($(this).parent().width() - 0);
        });
    }).trigger('resize');

    // simple routing, @todo replace with actual ng routing
    var urlHash = window.location.hash;
    if (urlHash && urlHash.indexOf('#/example/')===0)
        var example = urlHash.replace('#/example/', '');
    else
        var example = 'hello-world';
    var link = $('.nav-list a[href="#/example/'+example+'"]');
    link.click();

    var sandbox = angular.element(document.body).scope();

    // execute click and form submit events via sandbox
    $('#php-output').on('click', 'a', function(event) {
        event.preventDefault();

        sandbox.run({
            url:   $(this).attr('href')+'&rnd='+Math.random(),
            method: 'get',
            async: $(this).data('async') !== false
        });
    });

    $('#php-output').on('submit', 'form', function(event) {
        event.preventDefault();
        var form = $(this);
        var method = form.attr('method') ? form.attr('method').toLowerCase() : 'get';
        var url = method==='get' ? '?'+form.serialize() : form.attr('action');
        sandbox.run({
            url: url,
            method: method,
            async: form.data('async') !== 'false',
            data: form.serialize()
        });
    });

    $('#box-intro').on('mouseenter', 'a', function(event) {
        var openPhp = $(this).attr('data-openPhp');
        if (openPhp) {
            event.preventDefault();
            var parts = openPhp.split(':');
            var file = parts[0];
            
            var line = parts.length>1 ? parts[1] : null;
            if (line) {
                var lines = line.split('-');
                startLine = lines[0];
                endLine = lines.length > 1 ? lines[1] : null;

            }
            sandbox.loadFile(file).done(function() {
                if (startLine!==null)
                    window.phpEditor.gotoLine(startLine);
                if (endLine!==null)
                    window.phpEditor.selection.selectTo(endLine);
            });
        }
    })
})