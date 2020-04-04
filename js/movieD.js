var theater = $("[name=theaterName] option").detach()
$("[name=city]").change(function() {
  var val = $(this).val()
  var newStr = val.replace(/\s+/g, '');
  $("[name=theaterName] option").detach()
  theater.filter("." + newStr).clone().appendTo("[name=theaterName]")
}).change()

var theater = $("[name=theaterName1] option").detach()
$("[name=city1]").change(function() {
  var val = $(this).val()
  var newStr = val.replace(/\s+/g, '');
  $("[name=theaterName1] option").detach()
  theater.filter("." + newStr).clone().appendTo("[name=theaterName1]")
}).change()

var theater = $("[name=theaterName2] option").detach()
$("[name=city2]").change(function() {
  var val = $(this).val()
  var newStr = val.replace(/\s+/g, '');
  $("[name=theaterName2] option").detach()
  theater.filter("." + newStr).clone().appendTo("[name=theaterName2]")
}).change()

var theater = $("[name=theaterName3] option").detach()
$("[name=city3]").change(function() {
  var val = $(this).val()
  var newStr = val.replace(/\s+/g, '');
  $("[name=theaterName3] option").detach()
  theater.filter("." + newStr).clone().appendTo("[name=theaterName3]")
}).change()

var theater = $("[name=theaterName4] option").detach()
$("[name=city4]").change(function() {
  var val = $(this).val()
  var newStr = val.replace(/\s+/g, '');
  $("[name=theaterName4] option").detach()
  theater.filter("." + newStr).clone().appendTo("[name=theaterName4]")
}).change()