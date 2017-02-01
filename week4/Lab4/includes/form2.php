<form action="#" method="get">
    <fieldset>
        <legend>&nbsp;&nbsp;Search:</legend>
        
        <label>&nbsp;&nbsp; Column</label>  
        <select name="columnSearch">
            <option value="id" <?php if ($columnSearch == "id"): ?> selected="selected"
               <?php endif; ?>
                    >ID</option>
            <option value="corp" <?php if ($columnSearch == "corp"): ?> selected="selected"
               <?php endif; ?>
                    >Corporation</option>
            <option value="incorp_dt" <?php if ($columnSearch == "incorp_dt"): ?> selected="selected"
               <?php endif; ?>
                    >Date -- Time Added</option>
            <option value="email" <?php if ($columnSearch == "email"): ?> selected="selected"
               <?php endif; ?>
                    >E-mail</option>
            <option value="zipcode" <?php if ($columnSearch == "zipcode"): ?> selected="selected"
               <?php endif; ?>
                    >Zip Code</option>
            <option value="owner" <?php if ($columnSearch == "owner"): ?> selected="selected"
               <?php endif; ?>
                    >Owner</option>
            <option value="phone" <?php if ($columnSearch == "phone"): ?> selected="selected"
               <?php endif; ?>
                    >Phone</option>
        </select>
        
        <label>for:</label>
        <input name="search" type="search" placeholder="Search...." />
    
         <input type="hidden" name="action" value="Submit2" />
        <input type="submit" value="Submit" />
        <input type="reset" value="Reset"/>
        
    </fieldset>            
</form>