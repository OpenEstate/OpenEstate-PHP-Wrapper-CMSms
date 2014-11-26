{$tabs_start}
   {$start_general_tab}
    <div class="pagetext">
      <p style="font-size:1.3em;">{$mod->Lang('title_about')}</p>
      <div style="padding:0.5em 1em 1em 3em;">
        {$mod->GetFriendlyName()} <span style="font-weight:normal;">(version {$mod->GetVersion()})</span>
        <br/><em style="font-weight:normal;">{$mod->Lang('moddescription')}</em>
      </div>
    </div>
    <div class="pagetext">
      <p style="font-size:1.3em;">{$mod->Lang('title_license')}</p>
      <div style="padding:0.5em 1em 1em 3em;">
        <a href="{$module_url}gpl-3.0-standalone.html" target="_blank">{$mod->GetLicense()}</a>
      </div>
    </div>
    <div class="pagetext">
      <p style="font-size:1.3em;">{$mod->Lang('title_authors')}</p>
      <div style="padding:0.5em 1em 1em 3em;">
        <a href="http://www.openestate.org/" target="_blank">
          <img src="{$module_url}images/openestate.png" border="0" alt="0" />
          <div style="margin-top:0.5em;">{$mod->GetAuthor()}</div>
        </a>
      </div>
    </div>
    <div class="pagetext">
      <p style="font-size:1.3em;">{$mod->Lang('title_support')}</p>
      <div style="padding:0.5em 1em 1em 3em;">
        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
          <input type="hidden" name="cmd" value="_s-xclick">
          <input type="hidden" name="hosted_button_id" value="11005790">
          <input type="image" style="border:none;" src="https://www.paypal.com/de_DE/DE/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="Jetzt einfach, schnell und sicher online bezahlen – mit PayPal.">
          <img alt="" border="0" src="https://www.paypal.com/de_DE/i/scr/pixel.gif" width="1" height="1" style="border:none;">
        </form>
      </div>
    </div>
   {$tab_end}
   {$start_prefs_tab}
      {if $start_prefs_tab != ''}
      {$start_form}
      	<div class="pageoverflow">
      		<p class="pagetext" style="font-size:1.3em;">{$mod->Lang('title_wrap_path')}</p>
      		<p class="pageinput">{$input_wrap_path}</p>
      	</div>
      	<div class="pageoverflow">
      		<p class="pagetext" style="font-size:1.3em;">{$mod->Lang('title_wrap_url')}</p>
      		<p class="pageinput">{$input_wrap_url}</p>
      	</div>
      	<div class="pageoverflow">
      		<p class="pagetext">&nbsp;</p>
      		<p class="pageinput">{$submit}</p>
      	</div>
      {$mod->CreateFormEnd()}
      {/if}
   {$tab_end}
   {$start_integration_tab}
     {if $start_integration_tab != ''}
      	<div class="pageoverflow">
      		<p class="pagetext" style="font-size:1.3em;">{$mod->Lang('title_wrap_test')}</p>
      		<div class="pagetext">{$wrap_test}</div>
      	</div>
      	{if $tag_builder != ''}
        	<div class="pageoverflow">
        		<p class="pagetext" style="font-size:1.3em;">{$mod->Lang('title_wrap_tag')}</p>
        		<p class="pageinput">{$mod->Lang('title_wrap_tag_help')} (<a href="#" onclick="build_tag(); return false;">{$mod->Lang('rebuild')}</a>)</p>
        		<div id="tag_builder" class="pagetext" style="border:1px solid #c0c0c0; background-color:#f0f0f0; padding:1em;">&nbsp;</div>
        	</div>
        	
        	<!-- wrap index -->
        	<div class="pageoverflow">
        		<p class="pagetext"><input id="wrap_index" name="wrap" value="index" type="radio" checked="checked" onchange="show_wrapper_form(this.value); build_tag();" /><label for="wrap_index">{$mod->Lang('title_wrap_listing')}</label></p>
        	</div>
        	<div id="wrap_index_form" style="padding-left:3em;">
          	<div class="pageoverflow">
          		<p class="pagetext">{$mod->Lang('title_wrap_tag_view')}</p>
          		<p class="pageinput">{$input_index_view}</p>
          	</div>
          	<div class="pageoverflow">
          		<p class="pagetext">{$mod->Lang('title_wrap_tag_mode')}</p>
          		<p class="pageinput">{$input_index_mode}</p>
          	</div>
          	<div class="pageoverflow">
          		<p class="pagetext">{$mod->Lang('title_wrap_tag_lang')}</p>
          		<p class="pageinput">{$input_index_lang}</p>
          	</div>
          	<div class="pageoverflow">
          		<p class="pagetext">{$mod->Lang('title_wrap_tag_order')}</p>
          		<p class="pageinput">{$input_index_order_by} {$input_index_order_dir}</p>
          	</div>
          	<div class="pageoverflow">
          		<p class="pagetext">{$mod->Lang('title_wrap_tag_filter')}</p>
          		<div class="pageinput">{$input_index_filters}</div>
          	</div>
        	</div>
        	
        	<!-- wrap property -->
        	<div class="pageoverflow">
        		<p class="pagetext"><input id="wrap_expose" name="wrap" value="expose" type="radio" onchange="show_wrapper_form(this.value); build_tag();" /><label for="wrap_expose">{$mod->Lang('title_wrap_property')}</label></p>
        	</div>
        	<div id="wrap_expose_form" style="padding-left:3em; position:absolute; visibility:hidden;">
          	<div class="pageoverflow">
          		<p class="pagetext">{$mod->Lang('title_wrap_tag_view')}</p>
          		<p class="pageinput">{$input_expose_view}</p>
          	</div>
          	<div class="pageoverflow">
          		<p class="pagetext">{$mod->Lang('title_wrap_tag_lang')}</p>
          		<p class="pageinput">{$input_expose_lang}</p>
          	</div>
          	<div class="pageoverflow">
          		<p class="pagetext">{$mod->Lang('title_wrap_tag_property')}</p>
          		<p class="pageinput">{$input_expose_id}</p>
          	</div>
        	</div>        	
        	
{literal}
<script type="text/javascript">
<!--
function show_wrapper_form( $value )
{
  document.getElementById( 'wrap_index_form' ).style.visibility = ($value=='index')? 'visible': 'hidden';
  document.getElementById( 'wrap_index_form' ).style.position = ($value=='index')? 'relative': 'absolute';
  document.getElementById( 'wrap_expose_form' ).style.visibility = ($value=='expose')? 'visible': 'hidden';
  document.getElementById( 'wrap_expose_form' ).style.position = ($value=='expose')? 'relative': 'absolute';
}
function build_tag()
{
  //alert( 'build_tag' );
  var obj = document.getElementById('tag_builder');
  if (obj==null) return;
  var wrap_index = document.getElementById('wrap_index');
  var wrap_expose = document.getElementById('wrap_expose');
  
  var obj2 = null;
  var params = '';

  if (wrap_index!=null && wrap_index.checked==true)
  { 
    params += ' wrap="' + wrap_index.value + '"';
  
    obj2 = document.getElementById('tag_index_view');
    if (obj2!=null) params += ' view="' + obj2.value + '"';

    obj2 = document.getElementById('tag_index_mode');
    if (obj2!=null) params += ' mode="' + obj2.value + '"';

    obj2 = document.getElementById('tag_index_lang');
    if (obj2!=null) params += ' lang="' + obj2.value + '"';
    
    obj2 = document.getElementById('tag_index_order_by');
    if (obj2!=null) params += ' order_by="' + obj2.value + '"';
    
    obj2 = document.getElementById('tag_index_order_dir');
    if (obj2!=null) params += ' order_dir="' + obj2.value + '"';
    
    filters = [{/literal}{$filter_ids}{literal}];
    for (var i=0; i<filters.length; i++)
    {
      obj2 = document.getElementById(filters[i]);
      val = '';
      //alert( filters[i] + ': ' + obj2.checked );
      if (obj2.checked==true || obj2.checked==false)
      {
        if (obj2.checked==true) val = obj2.value;
      }
      else    
      {
        val = obj2.value;
      }
      if (val!='' && obj2!=null) params += ' ' + filters[i] + '="' + val + '"';
    }
  }
  
  else if (wrap_expose!=null && wrap_expose.checked==true)
  {
    params += ' wrap="' + wrap_expose.value + '"';
    
    obj2 = document.getElementById('tag_expose_view');
    if (obj2!=null) params += ' view="' + obj2.value + '"';
    
    obj2 = document.getElementById('tag_expose_lang');
    if (obj2!=null) params += ' lang="' + obj2.value + '"';
    
    obj2 = document.getElementById('m1_expose_id');
    if (obj2!=null && obj2.value!='') params += ' id="' + obj2.value + '"';
  }
  
  obj.innerHTML = '{OpenEstatePhpWrapper' + params + '}';
}
build_tag();
-->
</script>
{/literal}
      	{/if}
     {/if}
   {$tab_end}
{$tabs_end}