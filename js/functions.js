function log(str){
  var line = '';
  for(var i = 0; i < arguments.length; i++) line+= arguments[i] + ' ';
  console.log(line);
}