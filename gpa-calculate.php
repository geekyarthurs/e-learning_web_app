<?php include 'includes/header.php' ?>
<!-- Grade 11 Science -->

<h5 class="text-right text-light">&copy; Binit Ghimire</h5>

<div class="row mx-3 my-2">
<div class="col-sm-4">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class=" text-light">Grade 11 (Science)</h3>
</div>
<div class=" panel-body text-light">
<form name="gradeelevenscience">
English: <input type="text" id="et" class = "form-control w-50"/><br>
Physics Theory: <input type="text" id="pt" class = "form-control w-50"/><br>
Physics Practical: <input type="text" id="pp" class = "form-control w-50"/><br>
Chemistry Theory: <input type="text" id="ct" class = "form-control w-50"/><br>
Chemistry Practical: <input type="text" id="cp" class = "form-control w-50"/><br>
Bio/CS Theory: <input type="text" id="ot" class = "form-control w-50"/><br>
Bio/CS Practical: <input type="text" id="op" class = "form-control w-50"/><br>
Mathematics: <input type="text" id="mt" class = "form-control w-50"/><br>
<button type="submit" id="submit" class = "btn btn-danger w-50 btn-block" onclick="gradeelevensciencegpacalc()">Calculate</button>
</form>
<script type="text/javascript">
        function gradeelevensciencegpacalc()
        {
			var grades = ['A+', 'A', 'B+', 'B', 'C+', 'C', 'D+', 'D', 'E', 'N', 'a+', 'a', 'b+', 'b', 'c+', 'c', 'd+', 'd', 'e', 'n'], gpoints = [4.0, 3.6, 3.2, 2.8, 2.4, 2.0, 1.6, 1.2, 0.8, 0, 4.0, 3.6, 3.2, 2.8, 2.4, 2.0, 1.6, 1.2, 0.8, 0];
			usergrades = new Array(7);
			usergrades[0] = document.gradeelevenscience.et.value;
			usergrades[1] = document.gradeelevenscience.pt.value;
			usergrades[2] = document.gradeelevenscience.pp.value;
			usergrades[3] = document.gradeelevenscience.ct.value;
			usergrades[4] = document.gradeelevenscience.cp.value;
			usergrades[5] = document.gradeelevenscience.ot.value;
			usergrades[6] = document.gradeelevenscience.op.value;
			usergrades[7] = document.gradeelevenscience.mt.value;
			
			//checking if the user entered valid data 
			validtype=1;
			usergrades.forEach(function(entry) {
				if(grades.indexOf(entry.toUpperCase())==-1 ){
					validtype=0;
				}
			});
			if(validtype==0){
				// if invalid data
				alert('Please enter A+, A, B+, B, C+, C, D+, D, E or N only.') 
				}else{ 
				// if valid data
				et=grades.indexOf(usergrades[0].toUpperCase());
				etp=gpoints[et];
				pt=grades.indexOf(usergrades[1].toUpperCase());
				ptp=gpoints[pt];
				pp=grades.indexOf(usergrades[2].toUpperCase());
				ppp=gpoints[pp];
				ct=grades.indexOf(usergrades[3].toUpperCase());
				ctp=gpoints[ct];
				cp=grades.indexOf(usergrades[4].toUpperCase());
				cpp=gpoints[cp];
				ot=grades.indexOf(usergrades[5].toUpperCase());
				otp=gpoints[ot];
				op=grades.indexOf(usergrades[6].toUpperCase());
				opp=gpoints[op];
				mt=grades.indexOf(usergrades[7].toUpperCase());
				mtp=gpoints[mt];
				var theory = etp + ptp + ctp + otp + mtp;
				var practical = ppp + cpp + opp;
				var totalgrades = (4.69 * theory + 1.56 * practical)/(4.69*5+1.56*3);
				document.querySelectorAll('#submit').addEventListener("click", alert("Your Grade 11 GPA is "+totalgrades.toString()[0]+totalgrades.toString()[1]+totalgrades.toString()[2]+totalgrades.toString()[3]));
				}
			
        }
</script>
</div>
</div>
</div>

<!-- Grade 12 with Biology -->
<div class="col-sm-4">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class=" panel-title text-light">Grade 12 (Biology)</h3>
</div>
<div class="panel-body text-light">
<form name="gradetwelvebiology">
English: <input type="text" id="et" class = "form-control w-50"><br>
Nepali: <input type="text" id="nt" class = "form-control w-50"/><br>
Physics Theory: <input type="text" class = "form-control w-50" id="pt"/><br>
Physics Practical: <input type="text" class = "form-control w-50"  id="pp"/><br>
Chemistry Theory: <input type="text"  id="ct" class = "form-control w-50" /><br>
Chemistry Practical: <input type="text" class = "form-control w-50" id="cp"/><br>
Biology Theory: <input type="text" class = "form-control w-50" id="bt"/><br>
Biology Practical: <input type="text" class = "form-control w-50" id="bp"/><br>
<button type="submit"  class = "btn btn-danger w-50 btn-block" id="submit" onclick="gradetwelvebiologygpacalc()">Calculate</button>
</form>
<script type="text/javascript">
        function gradetwelvebiologygpacalc()
        {
			var grades = ['A+', 'A', 'B+', 'B', 'C+', 'C', 'D+', 'D', 'E', 'N', 'a+', 'a', 'b+', 'b', 'c+', 'c', 'd+', 'd', 'e', 'n'], gpoints = [4.0, 3.6, 3.2, 2.8, 2.4, 2.0, 1.6, 1.2, 0.8, 0, 4.0, 3.6, 3.2, 2.8, 2.4, 2.0, 1.6, 1.2, 0.8, 0];
			usergrades = new Array(7);
			usergrades[0] = document.gradetwelvebiology.et.value;
			usergrades[1] = document.gradetwelvebiology.nt.value;
			usergrades[2] = document.gradetwelvebiology.pt.value;
			usergrades[3] = document.gradetwelvebiology.pp.value;
			usergrades[4] = document.gradetwelvebiology.ct.value;
			usergrades[5] = document.gradetwelvebiology.cp.value;
			usergrades[6] = document.gradetwelvebiology.bt.value;
			usergrades[6] = document.gradetwelvebiology.bp.value;
			
			//checking if the user entered valid data 
			validtype=1;
			usergrades.forEach(function(entry) {
				if(grades.indexOf(entry.toUpperCase())==-1 ){
					validtype=0;
				}
			});
			if(validtype==0){
				// if invalid data
				alert('Please enter A+, A, B+, B, C+, C, D+, D, E or N only.') 
				}else{ 
				// if valid data
				et=grades.indexOf(usergrades[0].toUpperCase());
				etp=gpoints[et];
				nt=grades.indexOf(usergrades[1].toUpperCase());
				ntp=gpoints[nt];
				pt=grades.indexOf(usergrades[2].toUpperCase());
				ptp=gpoints[pt];
				pp=grades.indexOf(usergrades[3].toUpperCase());
				ppp=gpoints[pp];
				ct=grades.indexOf(usergrades[4].toUpperCase());
				ctp=gpoints[ct];
				cp=grades.indexOf(usergrades[5].toUpperCase());
				cpp=gpoints[cp];
				bt=grades.indexOf(usergrades[6].toUpperCase());
				btp=gpoints[bt];
				bp=grades.indexOf(usergrades[7].toUpperCase());
				bpp=gpoints[bp];
				var theory = etp + ntp + ptp + ctp + btp;
				var practical = ppp + cpp + bpp;
				var totalgrades = (4.69 * theory + 1.56 * practical)/(4.69*5+1.56*3);
				document.querySelectorAll('#submit').addEventListener("click", alert("Your Grade 12 GPA is "+totalgrades.toString()[0]+totalgrades.toString()[1]+totalgrades.toString()[2]+totalgrades.toString()[3]));
				}
			
        }
</script>
</div>
</div>
</div>

<!-- Grade 12 with Mathematics -->
<div class="col-sm-4">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title text-light">Grade 12 (Mathematics)</h3>
</div>
<div class="panel-body text-light ">
<form name="gradetwelvemathematics text-light">
English: <input type="text" id="et" class = "form-control w-50"/><br>
Nepali: <input type="text" id="nt" class = "form-control w-50"/><br>
Physics Theory: <input type="text" id="pt" class = "form-control w-50"/><br>
Physics Practical: <input type="text" id="pp" class = "form-control w-50"/><br>
Chemistry Theory: <input type="text" id="ct" class = "form-control w-50"/><br>
Chemistry Practical: <input type="text" id="cp" class = "form-control w-50"/><br>
Mathematics: <input type="text" id="mt" class = "form-control w-50"/><br>
<button type="submit"  class = "btn btn-danger w-50 btn-block" id="submit" onclick="gradetwelvemathematicsgpacalc()">Calculate</button>
</form>
</div>
<script type="text/javascript">

        function gradetwelvemathematicsgpacalc()
        {
			var grades = ['A+', 'A', 'B+', 'B', 'C+', 'C', 'D+', 'D', 'E', 'N', 'a+', 'a', 'b+', 'b', 'c+', 'c', 'd+', 'd', 'e', 'n'], gpoints = [4.0, 3.6, 3.2, 2.8, 2.4, 2.0, 1.6, 1.2, 0.8, 0, 4.0, 3.6, 3.2, 2.8, 2.4, 2.0, 1.6, 1.2, 0.8, 0];
			usergrades = new Array(7);
			usergrades[0] = document.gradetwelvemathematics.et.value;
			usergrades[1] = document.gradetwelvemathematics.nt.value;
			usergrades[2] = document.gradetwelvemathematics.pt.value;
			usergrades[3] = document.gradetwelvemathematics.pp.value;
			usergrades[4] = document.gradetwelvemathematics.ct.value;
			usergrades[5] = document.gradetwelvemathematics.cp.value;
			usergrades[6] = document.gradetwelvemathematics.mt.value;
			
			//checking if the user entered valid data 
			validtype=1;
			usergrades.forEach(function(entry) {
				if(grades.indexOf(entry.toUpperCase())==-1 ){
					validtype=0;
				}
			});
			if(validtype==0){
				// if invalid data
				alert('Please enter A+, A, B+, B, C+, C, D+, D, E or N only.') 
				}else{ 
				// if valid data			
				et=grades.indexOf(usergrades[0].toUpperCase());
				etp=gpoints[et];
				nt=grades.indexOf(usergrades[1].toUpperCase());
				ntp=gpoints[nt];
				pt=grades.indexOf(usergrades[2].toUpperCase());
				ptp=gpoints[pt];
				pp=grades.indexOf(usergrades[3].toUpperCase());
				ppp=gpoints[pp];
				ct=grades.indexOf(usergrades[4].toUpperCase());
				ctp=gpoints[ct];
				cp=grades.indexOf(usergrades[5].toUpperCase());
				cpp=gpoints[cp];
				mt=grades.indexOf(usergrades[6].toUpperCase());
				mtp=gpoints[mt];
				var theory = etp + ntp + ptp + ctp + mtp;
				var practical = ppp + cpp;
				var totalgrades = (4.69 * theory + 1.56 * practical)/(4.69*5+1.56*2);
				document.querySelectorAll('#submit').addEventListener("click", alert("Your Grade 12 GPA is "+totalgrades.toString()[0]+totalgrades.toString()[1]+totalgrades.toString()[2]+totalgrades.toString()[3]));
				}				
        }
</script>
</div>
</div>
</div>

<?php include 'includes/footer.php' ?>