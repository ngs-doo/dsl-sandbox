<style type="text/css">
#olap label { display: inline ;}
</style>

<form id="olap" method="post">
    <div>
        <strong>Facts</strong>
        <? foreach ($allFacts as $fact): ?>
            <label><input type="checkbox" <? if(in_array($fact, $facts)): ?>checked="checked"<?endif?> name="facts[<?=$fact?>]"> <?=$fact?></label>
        <? endforeach ?>
    </div>
    <div>
        <strong>Dimensions</strong>
        <? foreach ($allDims as $dim): ?>
            <label><input type="checkbox" <? if(in_array($dim, $dims)): ?>checked="checked"<?endif?> name="dims[<?=$dim?>]"> <?=$dim?></label>
        <? endforeach ?>
    </div>
    <button type="submit" class="btn">Analyze</button>
</form>

<table class="table table-condensed">
    <tr>
<? foreach ($dims as $dim): ?><th><?=$dim?></th><? endforeach ?>
<? foreach ($facts as $fact): ?><th><?=$fact?></th><? endforeach ?>
    </tr>    
<? foreach ($rows as $row): ?>
    <tr>
<?  foreach ($row as $cell): ?>
        <td><?=$cell?></td>
<?  endforeach ?>
    </tr>
<? endforeach ?>
</table>
