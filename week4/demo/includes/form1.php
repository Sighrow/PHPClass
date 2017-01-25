<form action="#" method="post">
    <fieldset>
        <legend>Form 1</legend>
        
        <label>Data one</label>  
        <input type="radio" name="dataone" value="ford" 
               <?php if ($dataone == "ford"): ?> checked="checked"
               <?php endif; ?>
               />
        <input type="radio" name="dataone" value="honda"
               <?php if ($dataone == "honda"): ?> checked="checked"
               <?php endif; ?>
               />

        <label>Data 2</label>  
        <select name="datatwo">
            <option value="eggs" <?php if ($datatwo == "eggs"): ?> selected="selected"
               <?php endif; ?>
                    >Eggs</option>
            <option value="bread"
                       <?php if ($datatwo == "bread"): ?> selected="selected"
               <?php endif; ?>
               />Bread</option>
        </select>
        <input type="hidden" name="action" value="Submit1" />
        <input type="submit" value="Submit1" />
    </fieldset>    
</form>