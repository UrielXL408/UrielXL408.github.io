let mouseTimeout;
          const rainElement = document.createElement('div');
          rainElement.classList.add('rain');
          document.body.appendChild(rainElement);
          rainElement.style.display = 'none';
  
          function resetMouseTimeout() {
              clearTimeout(mouseTimeout);
              rainElement.style.display = 'none';
              mouseTimeout = setTimeout(() => {
                  rainElement.style.display = 'block'; 
              }, 10000); 
          }
  
          window.addEventListener('mousemove', resetMouseTimeout);
          window.addEventListener('keydown', resetMouseTimeout);
          resetMouseTimeout(); 