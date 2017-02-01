<form action="#" method="get">
    <fieldset>
        <legend>Order:</legend>
        
        <label>ASC</label>  
        <input type="radio" name="order" value="ASC" 
        <?php if ($order === "ASC"): ?>
            checked="checked"
        <?php endif; ?>
               />
        
        <label>DESC</label>
        <input type="radio" name="order" value="DESC" 
        <?php if ($order === "DESC"): ?>
            checked="checked"
        <?php endif; ?>
               />
        
        <label></label>  
        <select name="columnOrder">
            <option value="id" <?php if ($columnOrder == "id"): ?> selected="selected"
               <?php endif; ?>
                    >ID</option>
            <option value="corp" <?php if ($columnOrder == "corp"): ?> selected="selected"
               <?php endif; ?>
                    >Corporation</option>
            <option value="incorp_dt" <?php if ($columnOrder == "incorp_dt"): ?> selected="selected"
               <?php endif; ?>
                    >Date -- Time Added</option>
            <option value="email" <?php if ($columnOrder == "email"): ?> selected="selected"
               <?php endif; ?>
                    >E-mail</option>
            <option value="zipcode" <?php if ($columnOrder == "zipcode"): ?> selected="selected"
               <?php endif; ?>
                    >Zip Code</option>
            <option value="owner" <?php if ($columnOrder == "owner"): ?> selected="selected"
               <?php endif; ?>
                    >Owner</option>
            <option value="phone" <?php if ($columnOrder == "phone"): ?> selected="selected"
               <?php endif; ?>
                    >Phone</option>
        </select>
        
        <input type="hidden" name="action" value="Submit1"/>
        <input type="submit" value="Order"/>
        <input type="reset" value="Reset"/>
        
    </fieldset>    
</form>