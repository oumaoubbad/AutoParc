@extends('layouts.master')     
@section('content')
<div class="container">

  <div class="row   my-5">
  <div class="col-sm">
                 
                 <table class = "calculator " >
                  
                  <tr>
                  <td colspan = "3"> <input class = "display-box" type = "text" id = "result" disabled /> </td>
                  <!-- clearScreen() function clear all the values -->
                  <td> <input class = "button" type = "button" value = "C" onclick = "clearScreen()" style = "background-color: #66D3FA" /> </td>
                  </tr>
                  <tr>
                  <!-- display() function display the value of clicked button -->
                  <td> <input class = "button" type = "button" value = "1" onclick = "display('1')" /> </td>
                  <td> <input class = "button" type = "button" value = "2" onclick = "display('2')" /> </td>
                  <td> <input class = "button" type = "button" value = "3" onclick = "display('3')" /> </td>
                  <td> <input class = "button1" type = "button" value = "/" onclick = "display('/')" /> </td>
                  </tr>
                  <tr>
                  <td> <input class = "button" type = "button" value = "4" onclick = "display('4')" /> </td>
                  <td> <input class = "button" type = "button" value = "5" onclick = "display('5')" /> </td>
                  <td> <input class = "button" type = "button" value = "6" onclick = "display('6')" /> </td>
                  <td> <input class = "button1" type = "button" value = "-" onclick = "display('-')" /> </td>
                  </tr>
                  <tr>
                  <td> <input class = "button" type = "button" value = "7" onclick = "display('7')" /> </td>
                  <td> <input class = "button" type = "button" value = "8" onclick = "display('8')" /> </td>
                  <td> <input class = "button" type = "button" value = "9" onclick = "display('9')" /> </td>
                  <td> <input class = "button1" type = "button" value = "+" onclick = "display('+')" /> </td>
                  </tr>
                  <tr>
                  <td> <input class = "button1" type = "button" value = "." onclick = "display('.')" /> </td>
                  <td> <input class = "button" type = "button" value = "0" onclick = "display('0')" /> </td>
                  <!-- calculate() function evaluate the mathematical expression -->
                  <td> <input class = "button" type = "button" value = "=" onclick = "calculate()" style = "background-color: #66D3FA" /> </td>
                  <td> <input class = "button1" type = "button" value = "*" onclick = "display('*')" /> </td>
                  </tr>
                  </table>
                 </div>

            
    <div class="col-md-6 mp-3 mx-auto card  border-info">
    
    <h3 class="text-dark  ">
              <strong>  Ajouter Traite  </strong>
                                </h3>


                                @if ($errors->any())
        <div class="alert alert-info">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('traites.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        



                              <div class="form-group">
                              <strong>voiture:</strong>
         <select name="voiture_id" class="form-control" aria-label="Default select example">
         
              <option selected> Voiture</option>
              @foreach ($voitures as $voiture)
                  <option value="{{ $voiture->id }}">{{ $voiture->matricule }}</option>
              @endforeach
          </select>
                              </div>
                              <div class="form-group">
                              <strong>date d'achat:</strong>
                            

<input type="date" name="date_achat"
       value="2022-07-6"
       min="2000-01-01" max="2100-12-31">
</div>
                              
                              <div class="form-group">
                              <strong>jour de traite:</strong>
                <input type="text" name="jour_traite" class="form-control" placeholder="jour_traite">
                              </div>
                              
                              <div class="form-group">
                              <strong>mois resté:</strong>
                <input type="text" name="mois_reste" class="form-control" placeholder="mois_reste">
                              </div>
                              
                              <div class="form-group">
                              <strong>montant avancé:</strong>
                <input type="text" name="montant_avance" class="form-control" placeholder="montant_avance">
                              </div>
                              
                              <div class="form-group">
                              <strong>prix d'achat:</strong>
                <input type="text" name="prix_achat" class="form-control" placeholder="prix_achat">
                              </div>
                              
                             
                              <div class="form-group">
                                  <button class="btn btn-info">
                                      Ajouter
                                  </button>
                                  
                <a class="btn btn-secondary" href="{{ route('traites.index') }}"> retour</a>
          
                              </div>
                              </form>
   
                            
  </div>
</div>
</div>
@endsection
@section('css')
<style>
    .calculator {
 padding: 10px;
 border-radius: 2em;
 height: 510px;
 width: 450px;
 margin: auto;
 background-color: #dcdbe1;
 box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
}
.display-box {
 font-family: 'Orbitron', sans-serif;
  background-color: white;
 border: solid black 0.5px;
 color: black;
 border-radius: 5px;
 border-radius: 1em;
 width: 100%;
 height: 65%;
}
.button {
 font-family: 'Orbitron', sans-serif;
 background-color: grey;
 color: white;
 border: solid black 0.5px;
 width: 85%;
 border-radius: 1em;
 
 height: 70%;
 outline: none;
}
.button1{
    font-family: 'Orbitron', sans-serif;
 background-color: #191b28;
 color: white;
 border: solid black 0.5px;
 width: 85%;
 border-radius: 1em;
 
 height: 70%;
 outline: none;
}
.button:active {
 background: #e5e5e5;
 -webkit-box-shadow: inset 0px 0px 5px #c1c1c1;
 -moz-box-shadow: inset 0px 0px 5px #c1c1c1;
 box-shadow: inset 0px 0px 5px #c1c1c1;
}
    </style>

@endsection
@section('js')
  
     <script> 
        function clearScreen() {
 document.getElementById("result").value = "";
}

// This function display values
function display(value) {
 document.getElementById("result").value += value;
}
// This function evaluates the expression and return result
function calculate() {
 var p = document.getElementById("result").value;
 var q = eval(p);
 document.getElementById("result").value = q;
}
      </script>
  
@endsection