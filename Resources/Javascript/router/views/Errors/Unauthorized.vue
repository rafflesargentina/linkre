<template>
  <ErrorPage>
    <h4 
      slot="subtitle" 
      class="error__subtitle"
    >
      Error 401
    </h4>
    <h1 
      slot="title" 
      class="error__title display-4"
    >
      No Autorizado
    </h1>
    <p 
      slot="description" 
      class="error__p text-muted"
    >
      No tienes permiso concedido para ingresar a esta página o sección.<br>Si estás intentando visualizar un proyecto, debes tener en cuenta que un miembro de nuestro equipo debe verificar tu perfil primero, y entonces te asignará los proyectos que mejor se ajusten a tus necesidades.<br>Finalizada la revisión recibirás un mail de confirmación indicando qué proyectos te fueron asignados.
    </p>
    <p
      slot="description"
      class="error__p text-muted"
    >
      Si ya tienes proyectos asignados y quieres visualizar este proyecto también, por favor escríbenos a <a href="mailto:admin@linkre.biz">admin@linkre.biz</a> indicando tus motivos para la solicitud de acceso.
    </p>
    </p>
  </ErrorPage>
</template>
