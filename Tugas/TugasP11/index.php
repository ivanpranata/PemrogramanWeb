<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title> Latihan nilai</title> 
     <link rel="stylesheet" href="style.css">
 </head>


 <body>
     <body>
     <div class="header">Latihan Nilai Pertemuan Form P11</div>
     <div class="container">
     <div class="form-container">
             <h1>cek nilai</h1>
     <label for="nim">nim</label>
     <input type="text" id="nim"><br>
 
     <label for="nilai">nilai matkul</label>
     <input type="number" id="nilai"><br>
     <button onclick="hitung()">hitung</button>
 
     <table border="1">
         <tr>
             <td>rentang nilai</td>    
             <td>huruf mutu</td>    
         </tr>
         <tr>
             <td>80-100</td>
             <td>A</td>
         </tr>
         <tr>
             <td>70-79</td>
             <td>B</td>
         </tr>
         <tr>
             <td>60-69</td>
             <td>C</td>
         </tr>
         <tr>
             <td>50-59</td>
             <td>D</td>
         </tr>
         <tr>
             <td>0-49</td>
             <td>E</td>
         </tr>
     </table>
 
     <p>hasil: <span id="hasil"></span></p>
 
     <script src="Script.js"></script>
         </div>
        
     </div>
 </body>
 </html>