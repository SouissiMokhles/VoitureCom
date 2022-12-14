public function detailsAction($id)
    {
        $user=$this->getUser();
        if(!is_object($user) || !$user instanceof UserInterface)
        {
            return $this->redirect("http://localhost/pi-dev/web/app_dev.php/login");
        }
        $publication=$this->getDoctrine()->getRepository(Publication::class)->find($id);

        $commentaires=$this->getDoctrine()->getRepository(Commentaire::class)->findBy(array('idpublication'=>$id));
        return $this->render('@Forum/Publication/detailsPublication.html.twig',array(
            'pub'=>$publication,
            'comment'=>$commentaires,

        ));
    }


    {% extends 'backoffice.html.twig' %}

{% block content %}
<br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
<div>
    <div class="container">
        <div class="row">
            <div>
                <div>
                    <div class="card-header ">


                    </div>
                    <div >
                        <table>

                            <tbody>
                            <thead>
                            <th>
                                <h4 class="card-title">{{ pub.typep }}</h4>
                            </th>
                            <th>

                            </th>
                            <th></th>

                            </th><th>

                            </th><th>






                            </thead>
                            <tr>
                            <td></td>
                                <td></td>
                                <td></td>

                                <td></td>
                               <td width="400">

                                   <img src="{{ asset('images/')~pub.image }}" width="250">
                               </td>

                            </tr>
                            <tr>
                                <td></td>
                                <td></td>

                                <td></td>
                                <td></td>


                                <td>
                                    {{ pub.descriptionp }}
                                </td>

                            </tr>

                            <tr>



                            </tr>
                            {% for c in comment %}
                            <tr>
                                <td style="text-color: #062c33"><p>Liste des Commentaires :        </p></td>

                                <td><p>nom: {{ c.idUser.nom }}</p></td>
                                <td><p>description: {{ c.descriptionc }}</p></td>
                                <td width="200"><p>date: {{ c.datec|date }}</p></td>
                                <td> <p><a href="{{ path('commentaire_supp', { 'id': c.idc }) }}"><i class="fa fa-minus-circle"></i> supprimer</a></p></td>

                            </tr>
{% endfor %}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

{% endblock %}


publication_details:
    path:     /details/{id}
    defaults: { _controller: ForumBundle:Forum:details }