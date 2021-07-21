# Sistema-de-Reserva-de-Citas
Este sistema fue desarrollado para una empresa, debido a un acuerdo de privacidad con la misma el codigo fuente no lo puedo publicar. Debido a esto adjunto imágenes del sistema y su funcionamiento.

El objetivo principal de este proyecto fue desarrollar un sistema de reserva de citas donde las personas puedan solicitar citas personalizadas a la empresa. Hay solamente 2 roles los cuales son usuario y cliente; existe una cuenta de administrador maestra que es la encargada de crear las demás cuentas tanto para clientes como nuevos administradores.

El sistema se desarrolló para que las cuentas de los clientes sea creadas por los administradores, ya que estos deben contactarse con la empresa para solicitar el servicio.

A continuación muestro las funcionalidades mas importantes del sistema de citas:

  1)Registro de Usuarios:
  
  El sistema se basa únicamente en 2 tipos de usuarios "administradores y clientes". Para crear un nuevo usuario ya sea alguno de los 2 anteriores esta acción debe ser realizada por el administrador principal, quien ya tiene una cuenta habilitada desde el inicio.
  Cabe recalcar que quien crea las cuentas a los usuarios es la empresa, no los mismo usuarios; por lo que los adminisradores son quienes en realidad lo hacen.
    
  <img src="img/registro.PNG" width="800">    
   
    
  *Creación exitosa de usuario
  
  <img src="img/registro2.PNG" width="800">    
    
    
   2)Envío de Correos masivos:
   
   Esta funcionalidad como su titulo dice permite a los administradores enviar correos masivos a todos los usuarios que tengan el rol de clientes. El correo permite enviar un asunto, el cuerpo del mensaje y un limite de 5 imagenes.
   
   <img src="img/correos.PNG" width="800">    
   
    *Envío de correos
    
   <img src="img/correos_envio.PNG" width="800">
   
   3)Administración de Citas:
   
   Los usuarios con rol-administrador podrán administrar las citas solicitadas por los clientes, pueden aceptar o rechazar una cita. En el caso de aceptar una cita los reedirigirá a un nuevo formulario para dar los detalles finales y aceptar completamente la cita. Al ser aceptada se envía un mensaje al correo del usuario.
   
   En el caso de ser rechazada, se le enviará al usuario un correo explicando el motivo por el cual su solicitud fue denegada.
   
   <img src="img/citas.PNG" width="800">
   
   
   4)Calendario:
   
   En el calendario se visualizan las fechas de las citas aceptadas. El calendario de los clientes muestra el dia de su cita; mientras que el de los administradores muestra todas las citas de todos los clientes.
   
   <img src="img/calendario.PNG" width="800">
   
   El calendario tambien tiene una opcion de ver información detallada, al presionar sobre la cita se desplegará un modal con la información completa de la cita.
   
   <img src="img/calendario_modal.PNG" width="800">
   
   5)Cambio de idioma:
   
   El sistema está adaptado a dos idiomas, español e inglés.
   
   <img src="img/idioma.PNG" width="800">
      
   <img src="img/idioma_ingles.PNG" width="800">
   
   
   
   6)Perfil del Usuario:
   
   El usuarios tiene la oportunidad de verificar su información personal usada para la cuenta. También tiene la función de cambiar su foto de perfil de cuenta.
   
   <img src="img/perfil.PNG" width="800">
   
   
   6)Diseño Responsivo:
    
    El sistema también es responsivo para su empleabilidad tanto en móviles, tablets y pc escritorio.
    
   <img src="img/responsive.PNG" width="400">
      
   <img src="img/responsive2.PNG" width="400">
    
   
   
   



