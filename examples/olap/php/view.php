<style type="text/css">
#olap label { display: inline ;}
</style>
<form id="olap">
    Facts:
    <? foreach ($facts as $f): ?>
        <label><input type="checkbox" name="facts[<?=$f?>]"> <?=$f?></label>
    <? endforeach ?>
    Dimensions:
    <? foreach ($dims as $d): ?>
        <label><input type="checkbox" name="dims[<?=$d?>]"><?=$d?></label>
    <? endforeach ?>
    <button type="submit">Submit</button>
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
