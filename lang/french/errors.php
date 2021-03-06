<?php
/*##################################################
 *                                errors.php
 *                            -------------------
 *   begin                : June 27, 2006
 *   copyright            : (C) 2005 Viarre Régis
 *   email                : mickaelhemri@gmail.com
 *
 *
 ###################################################
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 *
 ###################################################*/


 ####################################################
#                        French                     #
 ####################################################

//Erreurs
$LANG['e_incomplete'] = 'Tous les champs obligatoires doivent être remplis !';
$LANG['e_readonly'] = 'Vous ne pouvez exécuter cette action, car vous avez été placé en lecture seule !';
$LANG['e_flood'] = 'Vous ne pouvez pas encore poster, réessayez dans quelques instants';
$LANG['e_l_flood'] = 'Nombre maximum de lien(s) internet autorisé(s) dans votre message : %d';

//Upload
$LANG['e_upload_max_dimension'] = 'Dimensions maximales du fichier dépassées';
$LANG['e_upload_max_weight'] = 'Poids maximum du fichier dépassé';
$LANG['e_upload_invalid_format'] = 'Format du fichier invalide';
$LANG['e_upload_php_code'] = 'Contenu du fichier invalide, le code php est interdit';
$LANG['e_upload_error'] = 'Erreur lors de l\'upload du fichier';
$LANG['e_unlink_disabled'] = 'Fonction de suppression des fichiers désactivée sur votre serveur';
$LANG['e_upload_failed_unwritable'] = 'Upload impossible, interdiction d\'écriture dans ce dossier';
$LANG['e_upload_already_exist'] = 'Le fichier existe déjà, écrasement non autorisé';
$LANG['e_max_data_reach'] = 'Taille maximale atteinte, supprimez d\'anciens fichiers';

//Membres
$LANG['e_display_name_auth'] = 'Le nom d\'affichage entré est déjà utilisé !';
$LANG['e_pseudo_auth'] = 'Le pseudo entré est déjà utilisé !';
$LANG['e_mail_auth'] = 'L\'adresse email entrée est déjà utilisée !';
$LANG['e_member_ban'] = 'Vous avez été banni! Vous pourrez vous reconnecter dans';
$LANG['e_member_ban_w'] = 'Vous avez été banni pour un comportement abusif! Contactez l\'administrateur s\'il s\'agit d\'une erreur.';
$LANG['e_unactiv_member'] = 'Votre compte n\'a pas encore été activé !';

//Groupes
$LANG['e_already_group'] = 'Le membre appartient déjà au groupe';

//Mps
$LANG['e_pm_full'] = 'Votre boite de messages privés est pleine, vous avez <strong>%d</strong> conversation(s) en attente, supprimez d\'anciennes conversations pour pouvoir la/les lire.';
$LANG['e_pm_full_post'] = 'Votre boite de messages privés est pleine, supprimez d\'anciennes conversations pour pouvoir en envoyer de nouvelles.';
$LANG['e_unexist_user'] = 'L\'utilisateur sélectionné n\'existe pas !';
$LANG['e_pm_del'] = 'Le destinataire a supprimé la conversation, vous ne pouvez plus poster';
$LANG['e_pm_noedit'] = 'Le destinataire a déjà lu votre message, vous ne pouvez plus l\'éditer';
$LANG['e_pm_nodel'] = 'Le destinataire a déjà lu votre message, vous ne pouvez plus le supprimer';

?>
