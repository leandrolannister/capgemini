(function ()
  {      
    'Valida nome';
     const nome = document.querySelector('#nome');  

     nome.addEventListener('invalid', function () 
     {
       let $this = this;
       let errorsMessage = 'Informe um nome para o funcionário';

       $this.setCustomValidity('');

       if(!$this.validity.valid) $this.setCustomValidity(errorsMessage);
     });    
  })();
  (function ()
  {      
    'Valida Cidade';
     const cidade = document.querySelector('#cidade');  

     cidade.addEventListener('invalid', function () 
     {
       let $this = this;
       let errorsMessage = 'Informe uma  cidade';

       $this.setCustomValidity('');

       if(!$this.validity.valid) $this.setCustomValidity(errorsMessage);
     });    
  })();
  (function ()
  {      
    'Valida Telefone';
     const telefone = document.querySelector('#telefone');  

     telefone.addEventListener('invalid', function () 
     {
       let $this = this;
       let errorsMessage = 'Informe um  telefone de contato';

       $this.setCustomValidity('');

       if(!$this.validity.valid) $this.setCustomValidity(errorsMessage);
     });    
  })();  