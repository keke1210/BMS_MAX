<div class="form-group">
    <label>Emri</label>
    <input type="text" id="emri" name="name" class="form-control" placeholder="Emer Produkti" required>
</div>
<div class="form-group">
    <label>Cmimi</label>
    <input type="number" id="cmimi" name="cmimi" class="form-control" placeholder="Cmim Produkti" min="1" required>
</div>
<div class="form-group">
    <label>Gjendja</label>
    <input type="gjendja" id="gjendja" name="gjendja" class="form-control" placeholder="Gjendja" min="1" required>
</div>
<div class="form-group">
    <label>Kategoria</label>
    @php

    $categoryId = App\Category::all()->map(function ($category, $key){
       return $category->category_id;
   });

   $categoryName = App\Category::all()->map(function ($category, $key){
       return $category->name;
   });
   @endphp

   <select name="category_id" id="caregoryid" class="form-control">
      @for($i=0;$i<count($categoryId); $i++)
          <option value={{$categoryId[$i]}}>{{$categoryName[$i]}}</option>
      @endfor
   </select>

    
</div>
