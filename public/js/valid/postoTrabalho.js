(function ()
  {      
    'Valida setor';
     const setor = document.querySelector('#setor');  

     setor.addEventListener('invalid', function () 
     {
       let $this = this;
       let errorsMessage = 'Informe um setor';

       $this.setCustomValidity('');

       if(!$this.validity.valid) $this.setCustomValidity(errorsMessage);
     });    
  })();
  (function ()
  {      
    'Valida nome';
     const nome = document.querySelector('#nome');  

     nome.addEventListener('invalid', function () 
     {
       let $this = this;
       let errorsMessage = 'Informe um nome para Posto de Trabalho';

       $this.setCustomValidity('');

       if(!$this.validity.valid) $this.setCustomValidity(errorsMessage);
     });    
  })();
  (function ()
  {      
    'Valida tipo';
     const tipo = document.querySelector('#tipo');  

     tipo.addEventListener('invalid', function () 
     {
       let $this = this;
       let errorsMessage = 'Informe um tipo para Posto de Trabalho';

       $this.setCustomValidity('');

       if(!$this.validity.valid) $this.setCustomValidity(errorsMessage);
     });    
  })();
