<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <base href="">
    <title>magicResume</title>
    
    <link href="css/editor.css" rel="stylesheet">
    <link href="css/line-awesome.css" rel="stylesheet">
    <?php
        //config
        include "login/connectToBDD/conn.php";
        session_start();
    ?>
  </head>
<body>

	<div id="resume-editor">
				
				<div id="top-panel">
					<span class="float-left" id="logo"><a href="index.php"><img src="img/logo2.png"></a></span>
					
					
					<div class="btn-group mr-3" role="group">
					  <button class="btn btn-light" title="Undo (Ctrl/Cmd + Z)" id="undo-btn" data-vvveb-action="undo" data-vvveb-shortcut="ctrl+z">
						  <i class="la la-undo"></i>
					  </button>

					  <button class="btn btn-light"  title="Redo (Ctrl/Cmd + Shift + Z)" id="redo-btn" data-vvveb-action="redo" data-vvveb-shortcut="ctrl+shift+z">
						  <i class="la la-undo la-flip-horizontal"></i>
					  </button>
					</div>
										
					
					<div class="btn-group mr-3" role="group">
					  <button class="btn btn-light" title="Fullscreen (F11)" id="fullscreen-btn" data-toggle="button" aria-pressed="false" data-vvveb-action="fullscreen">
						  <i class="la la-arrows"></i>
					  </button>

					  <button class="btn btn-light" title="Preview" id="preview-btn" type="button" data-toggle="button" aria-pressed="false" data-vvveb-action="preview">
						  <i class="la la-eye"></i>
					  </button>

					  <!-- <button class="btn btn-light" title="Export (Ctrl + E)" id="save-btn" data-vvveb-action="save" data-vvveb-shortcut="ctrl+e"> -->
					  <button class="btn btn-light" title="Sauvegarder le CV    (Ctrl + E)" id="save-btn" data-vvveb-action="save" data-vvveb-shortcut="ctrl+e">
						  <i class="la la-save"></i>
					  </button>
					  
					  <button class="btn btn-light" title="Download" id="download-btn" data-vvveb-action="download" download="index.html">
						  <i class="la la-download"></i>
					  </button>

                      <button class="btn btn-light" title="PDF" id="pdf-btn" data-vvveb-action="pdf" download="">
                           <i class="la la-save"></i>
                      </button>
					</div>


					<div class="btn-group float-right" role="group">
		 			 <button id="mobile-view" data-view="mobile" class="btn btn-light"  title="Mobile view" data-vvveb-action="viewport">
						  <i class="ion-iphone"></i>
					  </button>

					  <button id="tablet-view"  data-view="tablet" class="btn btn-light"  title="Tablet view" data-vvveb-action="viewport">
						  <i class="ion-ipad"></i>
					  </button>

					  <button id="desktop-view"  data-view="" class="btn btn-light"  title="Desktop view" data-vvveb-action="viewport">
						  <i class="ion-monitor"></i>
					  </button>

					</div>

				</div>

				<div id="left-panel">

					<!-- TODO Affichage mes CV comme Templates -->
					<div id="resumemanager">
							<div class="header"><a href="#">Mes CVs</a></div>
							<div class="tree">
								<ol></ol>
							</div>
					  </div>

					  <div id="filemanager">
						  <div class="header"><a href="#">Templates</a></div>
						  <div class="tree">
							  <ol></ol>
						  </div>
					  </div>

					  <div id="components">

						<div id="components-sidepane" class="sidepane">
						  <div>

							<ul id="components-list" class="clearfix">
							</ul>

						  </div>
						</div>
					  </div>


				</div>

				<div id="canvas">
					<div id="iframe-wrapper">
						<div id="iframe-layer">

							<div id="highlight-box">
								<div id="highlight-name"></div>

							</div>

							<div id="select-box">

								<div id="wysiwyg-editor">
										<a id="bold-btn" href="" title="Bold"><i><strong>B</strong></i></a>
										<a id="italic-btn" href="" title="Italic"><i>I</i></a>
										<a id="underline-btn" href="" title="Underline"><u>u</u></a>
										<a id="strike-btn" href="" title="Strikeout"><strike>S</strike></a>
										<a id="link-btn" href="" title="Create link"><strong>a</strong></a>
								</div>

								<div id="select-actions">
									<a id="drag-box" href="" title="Drag element"><i class="ion-arrow-move"></i></a>
									<a id="parent-box" href="" title="Select parent"><i class="ion-reply"></i></a>

									<a id="up-box" href="" title="Move element up"><i class="ion-arrow-up-a"></i></a>
									<a id="down-box" href="" title="Move element down"><i class="ion-arrow-down-a"></i></a>
									<a id="clone-box" href="" title="Clone element"><i class="ion-ios-copy"></i></a>
									<a id="delete-box" href="" title="Remove element"><i class="ion-trash-a"></i></a>
								</div>
							</div>


						</div>
						<iframe src="about:none" id="iframe1"></iframe>
					</div>


				</div>

				<div id="right-panel">
					<div id="component-properties">
					</div>
				</div>

				<div id="bottom-panel">

				<div class="btn-group" role="group">

		 			 <button id="code-editor-btn btn-sm" data-view="mobile" class="btn btn-light btn-sm"  title="Code editor" data-vvveb-action="toggleEditor">
						  <i class="ion-code"></i> Code editor
					  </button>

						<div id="toggleEditorJsExecute" class="custom-control custom-checkbox mt-1" style="display:none">
							<input type="checkbox" class="custom-control-input" id="customCheck" name="example1" data-vvveb-action="toggleEditorJsExecute">
							<label class="custom-control-label" for="customCheck"><small>Run code on edit</small></label>
						</div>
					</div>

					<div id="vvveb-code-editor">
						<textarea class="form-control"></textarea>
					<div>

				</div>
			</div>
		</div>


<!-- templates -->

<script id="vvveb-input-textinput" type="text/html">

	<div>
		<input name="{%=key%}" type="text" class="form-control"/>
	</div>

</script>

<script id="vvveb-input-checkboxinput" type="text/html">

	<div class="custom-control custom-checkbox">
		  <input name="{%=key%}" class="custom-control-input" type="checkbox" id="{%=key%}_check">
		  <label class="custom-control-label" for="{%=key%}_check">{% if (typeof text !== 'undefined') { %} {%=text%} {% } %}</label>
	</div>

</script>

<script id="vvveb-input-radioinput" type="text/html">

	<div>

		{% for ( var i = 0; i < options.length; i++ ) { %}

		<label class="custom-control custom-radio  {% if (typeof inline !== 'undefined' && inline == true) { %}custom-control-inline{% } %}"  title="{%=options[i].title%}">
		  <input name="{%=key%}" class="custom-control-input" type="radio" value="{%=options[i].value%}" id="{%=key%}{%=i%}" {%if (options[i].checked) { %}checked="{%=options[i].checked%}"{% } %}>
		  <label class="custom-control-label" for="{%=key%}{%=i%}">{%=options[i].text%}</label>
		</label>

		{% } %}

	</div>

</script>

<script id="vvveb-input-radiobuttoninput" type="text/html">

	<div class="btn-group btn-group-toggle  {%if (extraclass) { %}{%=extraclass%}{% } %} clearfix" data-toggle="buttons">

		{% for ( var i = 0; i < options.length; i++ ) { %}

		<label class="btn btn-light  {%if (options[i].checked) { %}active{% } %}" for="{%=key%}{%=i%} " title="{%=options[i].title%}">
		  <input name="{%=key%}" class="custom-control-input" type="radio" value="{%=options[i].value%}" id="{%=key%}{%=i%}" {%if (options[i].checked) { %}checked="{%=options[i].checked%}"{% } %}>
		  {%if (options[i].icon) { %}<i class="{%=options[i].icon%}"></i>{% } %}
		  {%=options[i].text%}
		</label>

		{% } %}

	</div>

</script>


<script id="vvveb-input-toggle" type="text/html">

    <div class="toggle">
        <input type="checkbox" name="{%=key%}" value="{%=on%}" data-value-off="{%=off%}" data-value-on="{%=on%}" class="toggle-checkbox" id="{%=key%}">
        <label class="toggle-label" for="{%=key%}">
            <span class="toggle-inner"></span>
            <span class="toggle-switch"></span>
        </label>
    </div>

</script>

<script id="vvveb-input-header" type="text/html">

		<h6 class="header">{%=header%}</h6>

</script>


<script id="vvveb-input-select" type="text/html">

	<div>

		<select class="form-control custom-select">
			{% for ( var i = 0; i < options.length; i++ ) { %}
			<option value="{%=options[i].value%}">{%=options[i].text%}</option>
			{% } %}
		</select>

	</div>

</script>


<script id="vvveb-input-listinput" type="text/html">

	<div class="row">

		{% for ( var i = 0; i < options.length; i++ ) { %}
		<div class="col-6">
			<div class="input-group">
				<input name="{%=key%}_{%=i%}" type="text" class="form-control" value="{%=options[i].text%}"/>
				<div class="input-group-append">
					<button class="input-group-text btn btn-sm btn-danger">
						<i class="ion-trash-a"></i>
					</button>
				</div>
			  </div>
			  <br/>
		</div>
		{% } %}


		{% if (typeof hide_remove === 'undefined') { %}
		<div class="col-12">

			<button class="btn btn-sm btn-outline-primary">
				<i class="ion-trash-a"></i> Add new
			</button>

		</div>
		{% } %}

	</div>

</script>

<script id="vvveb-input-grid" type="text/html">

	<div class="row">
		<div class="mb-1 col-12">

			<label>Flexbox</label>
			<select class="form-control custom-select" name="col">

				<option value="">None</option>
				{% for ( var i = 1; i <= 12; i++ ) { %}
				<option value="{%=i%}" {% if ((typeof col !== 'undefined') && col == i) { %} selected {% } %}>{%=i%}</option>
				{% } %}

			</select>
			<br/>
		</div>

		<div class="col-6">
			<label>Extra small</label>
			<select class="form-control custom-select" name="col-xs">

				<option value="">None</option>
				{% for ( var i = 1; i <= 12; i++ ) { %}
				<option value="{%=i%}" {% if ((typeof col_xs !== 'undefined') && col_xs == i) { %} selected {% } %}>{%=i%}</option>
				{% } %}

			</select>
			<br/>
		</div>

		<div class="col-6">
			<label>Small</label>
			<select class="form-control custom-select" name="col-sm">

				<option value="">None</option>
				{% for ( var i = 1; i <= 12; i++ ) { %}
				<option value="{%=i%}" {% if ((typeof col_sm !== 'undefined') && col_sm == i) { %} selected {% } %}>{%=i%}</option>
				{% } %}

			</select>
			<br/>
		</div>

		<div class="col-6">
			<label>Medium</label>
			<select class="form-control custom-select" name="col-md">

				<option value="">None</option>
				{% for ( var i = 1; i <= 12; i++ ) { %}
				<option value="{%=i%}" {% if ((typeof col_md !== 'undefined') && col_md == i) { %} selected {% } %}>{%=i%}</option>
				{% } %}

			</select>
			<br/>
		</div>

		<div class="col-6 mb-1">
			<label>Large</label>
			<select class="form-control custom-select" name="col-lg">

				<option value="">None</option>
				{% for ( var i = 1; i <= 12; i++ ) { %}
				<option value="{%=i%}" {% if ((typeof col_lg !== 'undefined') && col_lg == i) { %} selected {% } %}>{%=i%}</option>
				{% } %}

			</select>
			<br/>
		</div>

		{% if (typeof hide_remove === 'undefined') { %}
		<div class="col-12">

			<button class="btn btn-sm btn-outline-light text-danger">
				<i class="ion-trash-a"></i> Remove
			</button>

		</div>
		{% } %}

	</div>

</script>

<script id="vvveb-input-textvalue" type="text/html">

	<div class="row">
		<div class="col-6 mb-1">
			<label>Value</label>
			<input name="value" type="text" value="{%=value%}" class="form-control"/>
		</div>

		<div class="col-6 mb-1">
			<label>Text</label>
			<input name="text" type="text" value="{%=text%}" class="form-control"/>
		</div>

		{% if (typeof hide_remove === 'undefined') { %}
		<div class="col-12">

			<button class="btn btn-sm btn-outline-light text-danger">
				<i class="ion-trash-a"></i> Remove
			</button>

		</div>
		{% } %}

	</div>

</script>

<script id="vvveb-input-rangeinput" type="text/html">

	<div>
		<input name="{%=key%}" type="range" min="{%=min%}" max="{%=max%}" step="{%=step%}" class="form-control"/>
	</div>

</script>

<script id="vvveb-input-imageinput" type="text/html">

	<div>
		<input name="{%=key%}" type="text" class="form-control"/>
		<input name="file" type="file" class="form-control"/>
	</div>

</script>

<script id="vvveb-input-colorinput" type="text/html">

	<div>
		<input name="{%=key%}" type="color" value="{%=value%}" pattern="#[a-f0-9]{6}" class="form-control"/>
	</div>

</script>

<script id="vvveb-input-numberinput" type="text/html">
	<div>
		<input name="{%=key%}" type="number" value="{%=value%}"
			  {% if (typeof min !== 'undefined' && min != false) { %}min="{%=min%}"{% } %}
			  {% if (typeof max !== 'undefined' && max != false) { %}max="{%=max%}"{% } %}
			  {% if (typeof step !== 'undefined' && step != false) { %}step="{%=step%}"{% } %}
		class="form-control"/>
	</div>
</script>

<script id="vvveb-input-button" type="text/html">
	<div>
		<button class="btn btn-sm btn-primary">
			<i class="ion-trash-a"></i> {%=text%}
		</button>
	</div>
</script>

<script id="vvveb-input-cssunitinput" type="text/html">
	<div class="input-group" id="cssunit-{%=key%}">
		<input name="number" type="number" value="{%=value%}"
			  {% if (typeof min !== 'undefined' && min != false) { %}min="{%=min%}"{% } %}
			  {% if (typeof max !== 'undefined' && max != false) { %}max="{%=max%}"{% } %}
			  {% if (typeof step !== 'undefined' && step != false) { %}step="{%=step%}"{% } %}
		class="form-control"/>
		 <div class="input-group-append">
		<select class="form-control custom-select small-arrow" name="unit">
			<option>em&ensp;</option>
			<option>px</option>
			<option>%</option>
			<option>rem</option>
			<option>auto</option>
		</select>
		</div>
	</div>

</script>

<script id="vvveb-resumemanager-page" type="text/html">
	<li data-id="{%=id%}" data-url="{%=url%}" data-page="{%=name%}" data-title="{%=title%}">
		<label for="{%=name%}"><span>{%=title%}</span></label> <input type="checkbox" checked id="{%=name%}" />
	</li>
</script>

<script id="vvveb-filemanager-page" type="text/html">
	<li data-url="{%=url%}" data-page="{%=name%}" data-title="{%=title%}">
		<label for="{%=name%}"><span>{%=title%}</span></label> <input type="checkbox" checked id="{%=name%}" />
	</li>
</script>

<script id="vvveb-filemanager-component" type="text/html">
	<li data-url="{%=url%}" data-component="{%=name%}" class="file">
		<a href="{%=url%}"><span>{%=title%}</span></a>
	</li>
</script>

<script id="vvveb-input-sectioninput" type="text/html">

		<label class="header" data-header="{%=key%}" for="header_{%=key%}"><span>&ensp;{%=header%}</span> <div class="header-arrow"></div></label>
		<input class="header_check" type="checkbox" {% if (typeof expanded !== 'undefined' && expanded == false) { %} {% } else { %}checked="true"{% } %} id="header_{%=key%}">
		<div class="section" data-section="{%=key%}"></div>

</script>


<script id="vvveb-property" type="text/html">

	<div class="form-group {% if (typeof col !== 'undefined' && col != false) { %} col-sm-{%=col%} d-inline-block {% } else { %}row{% } %}" data-key="{%=key%}" {% if (typeof group !== 'undefined' && group != null) { %}data-group="{%=group%}" {% } %}>

		{% if (typeof name !== 'undefined' && name != false) { %}<label class="{% if (typeof inline === 'undefined' ) { %}col-sm-4{% } %} control-label" for="input-model">{%=name%}</label>{% } %}

		<div class="{% if (typeof inline === 'undefined') { %}col-sm-{% if (typeof name !== 'undefined' && name != false) { %}8{% } else { %}12{% } } %} input"></div>

	</div>

</script>

<!--// end templates -->


<!-- export html modal-->
<div class="modal fade" id="manage-modal" tabindex="-1" role="dialog" aria-labelledby="manage-modal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modification du titre du CV</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <table>
              <tr>
                  <input type="hidden" id="resumeId" name="resumeId" class="form-control" required>
                  <td width="100%">
                      <input type="text" id="resumeTitle" name="resumeTitle" class="form-control" required>
                  </td>
                  <td width="20%">
                      <button type="button" class="btn btn-success" onclick="changeResumeTitle()">Enregistrer</button>
                  </td>
              </tr>
          </table>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" onclick="deleteResume(this)">Supprimer ce CV</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer la pop-up</button>
      </div>

    </div>
  </div>
</div>

<script>
    function deleteResume()
    {
        var resumeId = $('#resumeId')[0].value;
        console.log('resumeId = ',resumeId);

        $.ajax({
            type: "POST",
            url: 'deleteResume.php',
            data: {id: resumeId},
            success: function(data){
                console.log('suppression d\'un CV');
                location.reload(true); //on recharge la page pour faire apparaitre le nouveau nom du CV dans "mes CVs"
            }
        });
    }

    function changeResumeTitle()
    {
        var newResumeTitle = $('#resumeTitle')[0].value;
        console.log('newResumeTitle = ',newResumeTitle);

        var resumeId = $('#resumeId')[0].value;
        console.log('resumeId = ',resumeId);

        $.ajax({
            type: "POST",
            url: 'changeResumeName.php',
            data: {id: resumeId, title: newResumeTitle},
            success: function(data){
                console.log('renommage d\'un CV');
                location.reload(true); //on recharge la page pour faire apparaitre le nouveau nom du CV dans "mes CVs"
            }
        });
    }
</script>
<!-- jquery-->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.hotkeys.js"></script>

<!-- bootstrap-->
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- builder code-->
<script src="libs/builder/builder.js"></script>	
<!-- undo manager-->
<script src="libs/builder/undo.js"></script>	
<!-- inputs-->
<script src="libs/builder/inputs.js"></script>	
<!-- components-->
<script src="libs/builder/components-bootstrap4.js"></script>

<!-- plugins -->

<!-- code mirror - code editor syntax highlight -->
<link href="libs/codemirror/lib/codemirror.css" rel="stylesheet"/>
<link href="libs/codemirror/theme/material.css" rel="stylesheet"/>
<script src="libs/codemirror/lib/codemirror.js"></script>
<script src="libs/codemirror/lib/xml.js"></script>
<script src="libs/codemirror/lib/formatting.js"></script>
<script src="libs/builder/plugin-codemirror.js"></script>


<?php
//récupération des CV par utilisateur et stockage dans le tableau $tab[]

$tab = [];
if(isset($_SESSION['UserId']) && $_SESSION['UserId'] != "")
{
    $req=$bdd->prepare("SELECT * FROM users_resumes WHERE user_id=:UserId");
    $req->execute(array(
        'UserId'=>$_SESSION['UserId']
    ));
    while ($data = $req->fetch())
    {
        $tab[] = array('id' => $data["id"], 'short_title' => $data['short_title'], 'title' => $data["title"], 'resume_location' => $data["resume_location"]);
    }
}

?>

<script>
$(document).ready(function()
{
    var userLastResumeLocation = <?php echo json_encode($_SESSION['UserLastResumeLocation']); ?> ;
    var nbResume = <?php echo json_encode(count($tab)); ?> ;
    console.log('userLastResumeLocation : ',userLastResumeLocation);
    console.log('nbResume : ', nbResume);

    //Choix du template de base CV lors de l'affichage
	Vvveb.Builder.init(userLastResumeLocation, function() {
		//run code after page/iframe is loaded
	});

    $(function(){
        $('#left-panel li').each(function(){
            var $this = $(this);
            // if the current path is like this link, make it active
            if($this.attr('data-url').indexOf(userLastResumeLocation) !== -1){
                $this.addClass('active');
            }
        })
    })

	Vvveb.Gui.init();
    Vvveb.ResumeManager.init();

    var i;
    var tab = <?php echo json_encode($tab); ?> ;
    for (i = 0; i < nbResume; i++)
    {
        var id = tab[i]['id'];
        var short_title = tab[i]['short_title'];
        var title = tab[i]['title'];
        var resume_location = tab[i]['resume_location'];
        Vvveb.ResumeManager.addResume(id, short_title,title,resume_location);
    }

	Vvveb.FileManager.init();
    Vvveb.FileManager.addPages(
	[
		{name:"narrow-jumbotron", title:"Jumbotron",  url: "templates/narrow-jumbotron/index.html"},
		{name:"template1", title:"Template Développeur",  url: "templates/CV/template1.html"},
		{name:"template2", title:"Template Développeur 2",  url: "templates/CV/template2.html"},
        {name:"template3", title:"Template Plombier",  url: "templates/CV/template3.html"}
	]);

});
</script>
        <script src="https://cdn.recast.ai/webchat/webchat.js"
                channelId="e36cb074-9a3f-48aa-bb48-8fc86e9b2c42"
                token="11088d740cf3bf1668630ee094b10013"
                id="recast-webchat"
        ></script>
</body>
</html>




