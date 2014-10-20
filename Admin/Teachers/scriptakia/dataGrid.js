function CheckSelectedItem(frm,msg)
{
  if (frm.selected.value==''){
    alert(msg);
    return false;
  } else {
//    alert('ok');
    return true;
  }
}

function CheckSelectedItem2(obj,msg)
{
  if (obj.value=='' || obj.value=='0' || obj.value=='-1'){
    alert(msg);
    return false;
  } else {
    return true;
  }
}


//checks field obj (list of selected checkboxes)
//removes val from obj.value if val is in obj.value and adds it to obj.value if it is not
function updateSelBoxes(obj,val)
{
      selstr = obj.value;
      if (selstr==""){
        obj.value = val;
        return;
      }
      var arr = selstr.split(", ");
      index = -1;
      for (i=0;i<arr.length;i++){
        if (arr[i]==val){
        //get index of val in array
          index = i;
        }
      }
      if (index > -1){
      //remove val from array
        arr.splice(index,1);
      } else {
      //add val to array
        arr.push(val);
      }
      obj.value = arr.join(", ");
}

function gridCheckBoxes(formName,obj){

  var form = document.getElementsByName(formName);
  form = form[0];

  for (i=0; i < form.elements.length; i++)
    {
     if ((form.elements[i].type == 'checkbox'))
     {
        if(form.elements[i].checked){
          alert(form.elements[i].getAttribute('ID'));
        }
     }
    }
}

function highlightGridTRRadio2(formName, checkId){
  /*var count = 0;
  var form = document.getElementsByName(formName);
  form = form[0];
  for (i=0; i < form.elements.length; i++){
    if ((form.elements[i].type == 'radio')){
      var td = document.getElementById(checkId);

      if(form.elements[i].checked){
        td.className = 'gridRowSelected';

      }else{
        if ((count % 2) == 0){
          td.className = 'gridRowEven';
        }else{
          td.className = 'gridRowOdd';
        }
      }
      count++;
    }
  }*/
}

function highlightGridTRRadio(formName, checkId){

var page=document.forms[1].txtCurr.value;
  if (page==1) {
  	count = 1;
  }
  else count = 20*(page-1) + 1;


  for (i=0; i < document.forms[1].elements.length; i++){
    if ((document.forms[1].elements[i].type == 'checkbox') || (document.forms[1].elements[i].type == 'radio')){
      var tr = document.getElementById(count);
      if(document.forms[1].elements[i].checked){

        tr.className = 'gridRowSelected';
      }else{
        if ((count % 2) == 0){
          tr.className = 'gridRowEven';
        }else{
          tr.className = 'gridRowOdd';
        }
      }
      count++;
    }
  }
}

function highlightGridTR(row){
  var tr = document.getElementById(row);
	if(tr.className!="gridRowSelected")
		tr.className = 'gridRowHighlighted';

}

function DehighlightGridTR(row){
      var tr = document.getElementById(row);
	 if(tr.className!="gridRowSelected"){
      if ((row % 2) == 0){
          tr.className = 'gridRowEven';
        }else{
          tr.className = 'gridRowOdd';
        }}
}


function highlightGridTRCheckBox(formName, trId,checkId)
{
  var form = document.getElementsByName(formName);
  form = form[1];

  var td = document.getElementById(trId);
  var checked;

  for (i=0; i < form.elements.length; i++){
    if ((form.elements[i].type == 'checkbox')){
      if( form.elements[i].getAttribute('ID') == checkId)
        checked = form.elements[i].checked;
    }
  }

  if(checked){
    td.className = 'gridRowSelected';
  }else{
    if ((trId % 2) == 0)
      td.className = 'gridRowEven';
    else
      td.className = 'gridRowOdd';
  }
}


function doNavigate( pstrWhere, pintTot)
{
  var form=document.forms[1];
  var strTmp;
  var intPg;
  strTmp = form.txtCurr.value;
  intPg = parseInt(strTmp);

  if (isNaN(intPg)) intPg = 1;
    if ((pstrWhere == 'F' || pstrWhere == 'P') && intPg == 1)
    {
      alert("Bλέπετε ήδη την πρώτη σελίδα!");
      return;
    }else if ((pstrWhere == 'N' || pstrWhere == 'L') && intPg == pintTot) {
      alert("Bλέπετε ήδη την τελευταία σελίδα!");
      return;
    }
    if (pstrWhere == 'F')
      intPg = 1;
    else if (pstrWhere == 'P')
      intPg = intPg - 1;
    else if (pstrWhere == 'N')
      intPg = intPg + 1;
    else if (pstrWhere == 'L')
      intPg = pintTot;
    if (intPg < 1) intPg = 1;
    if (intPg > pintTot) intPg = pintTot;
      form.txtCurr.value = intPg;
      form.submit();
    }

function doSort(pstrFld, pstrOrd)
{
 var form=document.forms[1];

  form.txtSortCol.value = pstrFld;
  form.txtSortAsc.value = pstrOrd;
  form.submit();
}


function disableIfSelected(form, buttonValue){

 for (i=0; i < form.elements.length; i++){
    if ((form.elements[i].type == 'checkbox')){
      if( form.elements[i].getAttribute('ID') == buttonValue)
        if(form.elements[i].checked)
          form.disableSelected.value = buttonValue;
    }
  }

  form.submit();
}
