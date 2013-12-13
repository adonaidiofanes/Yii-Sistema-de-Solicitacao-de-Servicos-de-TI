/* ---------------------------------------------------------------------------------
 * Scripts customizados para o projeto de gerenciamento de OS
 * ---------------------------------------------------------------------------------
 */

$(function() {

  var valorFeriadoParcial;

  $("#Feriado_parcial").change(function(){
    $( "select option:selected" ).each(function() {
      valorFeriadoParcial = $(this).val();
    });

    if(valorFeriadoParcial==1){
      $(".horaInicial, .horaFinal").show('slow');
    } else {$(".horaInicial, .horaFinal").hide('slow');  }
    
    });
    
    if( $("#Feriado_parcial option:selected").text() == 'Sim' ){
      $(".horaInicial").removeClass('hide').show();
      $(".horaFinal").removeClass('hide').show();
    }
  
}); // Final do $(function())