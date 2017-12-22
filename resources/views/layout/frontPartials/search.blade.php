<div class="col-md-12 col-sm-12 col-xs-12">
   <div class="search-content">
      {!! Form::open(array('method'=>'post','route'=>'search.ride', 'class'=>'idealforms searchtours','autocomplete'=>'off')) !!}
         
         <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
               <div class="field">
                  <input id="source" name="source" type="text" size="50" placeholder="Source Location" autocomplete="on">
               </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
               <div class="field">
                  <input id="destination" name="destination" type="text" size="50" placeholder="Destination" autocomplete="on">
               </div>
            </div>            
            <div class="col-md-3 col-sm-3 col-xs-12">
               <div class="field">
                  <select id="no_seats" name="no_seats">
                     <option value="default">Number of seats</option>
                     <option>1</option>
                     <option>2</option>
                     <option>3</option>
                  </select>                  
               </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
               <div class="field idealforms-field idealforms-field-text">
                  <input name="travel_date" placeholder="Date" class="datepicker" type="text">
                  <i class="icon" style="display: none;"></i>
               </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
               <div class="field buttons">
                  <button type="submit" class="btn btn-lg green-color">Search</button>
               </div>
            </div>
         </div>
      {!!Form::close()!!}
   </div>
</div>

