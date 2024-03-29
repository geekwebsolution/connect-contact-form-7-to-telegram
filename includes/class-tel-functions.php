<?php
if(!class_exists('cf7tel_tel_functions')) {
    class cf7tel_tel_functions
    {
        private $cmd = 'cf7tel_start';
        private $bot_token;
        static $instance;
        public $domain = 'cf7-telegram';
        public $api_url = 'https://api.telegram.org/bot%s/';
        public $chats = array();

        /**
         * Constructor
         */
        function __construct(){
            $this->load_bot_token();
            $this->load_chats();
            
            add_action( 'admin_menu', array( $this, 'admin_menu_page' ) );
            add_action( 'current_screen', array( $this, 'current_screen' ), 999 );
            add_action( 'admin_init', array( $this, 'save_form' ), 50 );
            add_action( 'admin_init', array( $this, 'settings_section' ), 999 );
            add_action( 'cf7tel_telegram_settings', array( $this, 'check_bot_updates' ), 999 );
            add_action( 'wpcf7_before_send_mail', array( $this, 'send' ), PHP_INT_MAX, 3 );
            add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
            add_action( 'wp_ajax_cf7tel_telegram', array( $this, 'ajax' ) );
        }

        /**
         * Telegram setting fields
         */
        function settings_section() {
            add_settings_section(
                'cf7tel_sections_main', 
                __( 'Bot-settings', CF7TEL_TEXT_DOMAIN ),
                array(),
                'cf7tel_settings_page'
            );
            
            add_settings_field( 
                'bot_token', 
                __( 'Bot Token<br/><small>You need to create your own Telegram-Bot.<br/><a target="_blanc" href="https://core.telegram.org/bots#how-do-i-create-a-bot">How to create</a></small>', CF7TEL_TEXT_DOMAIN ), 
                array( $this, 'settings_clb' ), 
                'cf7tel_settings_page', 
                'cf7tel_sections_main', 
                array(
                    'type'		=> 'password',
                    'name'		=> 'cf7tel_telegram_tkn',
                    'value'		=> $this->get_bot_token(),
                    'ph'		=> __( 'Enter Bot Token here', CF7TEL_TEXT_DOMAIN ),
                )
            );
        }

        /**
         * Telegram bot token settings callback
         */
        function settings_clb( $data ){
            switch ( $data['type'] ){
                case 'text' :;
                case 'password' :
                    $disabled = !empty( $data['disabled'] ) ? ' disabled="disabled" ' : '';
                    $placeholder = ' placeholder="'. esc_attr( @$data['ph'] ) . '"';
                    echo '<input type="'. esc_attr( $data['type'] ) .'" ' . 'name="'. esc_attr( $data['name'] ) .'" ' . 'value="'. esc_attr( $data['value'] ) .'"' . 'class="large-text" ' . $disabled . $placeholder . ' autocomplete="off"/>';
                    break;
            }
        }

        function how_to_create_bot_token() { ?>
            <h3><?php echo esc_html( 'How to connect telegram with contact form', CF7TEL_TEXT_DOMAIN ); ?></h3>
            <div class="cf7tel-steps">
            <h4><?php echo esc_html( '1. Open Telegram and search for @BotFather:', CF7TEL_TEXT_DOMAIN ); ?></h4>
            <p><?php echo esc_html( 'Open the Telegram app or go to the Telegram website. In the search bar, type "@BotFather" and select the official BotFather bot from the search results.', CF7TEL_TEXT_DOMAIN ); ?></p>
            </div>

            <div class="cf7tel-steps">
            <h4><?php echo esc_html( '2. Start a conversation with BotFather:', CF7TEL_TEXT_DOMAIN ); ?></h4>
            <p><?php echo esc_html( 'Once you have found BotFather, start a conversation with it by clicking on the "Start" button or typing "/start" in the chat.', CF7TEL_TEXT_DOMAIN ); ?></p>
            </div>

            <div class="cf7tel-steps">
            <h4><?php echo esc_html( '3. Create a new bot:', CF7TEL_TEXT_DOMAIN ); ?></h4>
            <p><?php echo esc_html( 'To create a new bot, type "/newbot" and follow the instructions provided by BotFather.', CF7TEL_TEXT_DOMAIN ); ?></p>
            <p><?php echo esc_html( 'BotFather will ask you to choose a name for your bot. This is the name that will be displayed in chats.', CF7TEL_TEXT_DOMAIN ); ?></p>
            <p><?php echo esc_html( 'After choosing a name, BotFather will ask you to choose a username for your bot. This username must be unique and end with "bot" (e.g., "@example_bot").', CF7TEL_TEXT_DOMAIN ); ?></p>
            <p><?php echo esc_html( 'Once you have provided a username, BotFather will generate a token for your bot.', CF7TEL_TEXT_DOMAIN ); ?></p>
            </div>

            <div class="cf7tel-steps">
            <h4><?php echo esc_html( '4. Copy the bot token:', CF7TEL_TEXT_DOMAIN ); ?></h4>
            <p><?php echo esc_html( 'BotFather will provide you with a token for your bot. This token is a long string of characters that serves as a unique identifier for your bot.', CF7TEL_TEXT_DOMAIN ); ?></p>
            <p><?php echo esc_html( "Copy the token and keep it secure. Do not share it with anyone else, as it provides access to your bot's functionality.", CF7TEL_TEXT_DOMAIN ); ?></p>
            </div>

            <div class="cf7tel-steps">
            <h4><?php echo esc_html( '5. Use the bot token in your telegram settings:', CF7TEL_TEXT_DOMAIN ); ?></h4>
            <p><?php echo esc_html( 'Add Bot Token in settings. After that you need to have chat in Subscriber list. To add chat in list follow below given notes', CF7TEL_TEXT_DOMAIN ); ?></p>
            <p><strong>To add bot:</strong> send the <code>/cf7tel_start</code> comand to your bot</p>
            <p><strong>Add group:</strong> <?php echo esc_html( 'add your bot to the group and send the', CF7TEL_TEXT_DOMAIN ); ?> <code>/cf7tel_start</code> comand to your group</p>
            </div>
            <?php
        }

        /**
         * Admin menu page for Telegram configration
         */
        public function admin_menu_page() {
            add_submenu_page( 'wpcf7', 'CF7 Telegram', 'CF7 Telegram', 'wpcf7_read_contact_forms', 'cf7tel_telegram', array( $this, 'plugin_menu_cbf' ) );
        }

        public function plugin_menu_cbf() { ?>	
            <div class="wrap">
                <h1><?php echo __( 'Telegram notification settings', CF7TEL_TEXT_DOMAIN ); ?></h1>
                <div class="cf7tel-how-to-connect-tel">
                    <?php 
                        $this->bot_status();
                        $this->view_full_list();
                        settings_errors(); 
                    ?>
                    <form method="post" action="admin.php?page=cf7tel_telegram" class="cf7tel-form">
                        <?php settings_fields( 'cf7tel_settings_page' ); ?>
                        <?php do_settings_sections( 'cf7tel_settings_page' ); ?> 
                        <input type="hidden" name="cf7tel_settings_form_action" value="save" />
                        <p><?php echo __( 'To activate telegram notifications approve at least one subscriber And go to <code>Contact forms -> Edit form -> Telegram tab</code>. Then configure given settings in "Telegram" tab for telegram notification.', CF7TEL_TEXT_DOMAIN ); ?></p>
                        <?php submit_button(); ?>
                    </form>
                </div>
                <div class="cf7tel-how-to-connect-tel"><?php $this->how_to_create_bot_token(); ?></div>
            </div> 
            <?php
        }

        /**
         * Current page action
         */
        public function current_action() {
            return isset( $_REQUEST['action'] ) ? $_REQUEST['action'] : '';
        }

        /**
         * Admin telegram settings form submission
         */
        function save_form() {
            if ( $this->current_action() !== 'update' ) return;
            if ( ! wp_verify_nonce( @ $_POST['_wpnonce'], 'cf7tel_settings_page-options' ) ) return;
            
            $this->save_bot_token();
        }

        /**
         * After current screen loaded
         */
        function current_screen() {
            $screen = get_current_screen();
            if ( false === strpos( $screen->id, 'cf7tel_telegram' ) ) return;
            do_action( 'cf7tel_telegram_settings' );
        }

        /**
         * Admin enqueue scripts
         */
        function admin_enqueue_scripts($hook) {
            $localize_params = array(
                'ajax'		=> admin_url('admin-ajax.php'),
                'nonce'		=> wp_create_nonce( 'cf7tel_telegram_nonce' ),
                'l10n'		=> array(
                    'confirm_approve'	=> __( 'Do you really want to approve?', CF7TEL_TEXT_DOMAIN ),
                    'confirm_refuse'	=> __( 'Do you really want to refuse?', CF7TEL_TEXT_DOMAIN ),
                    'confirm_pause'		=> __( 'Do you really want to pause?', CF7TEL_TEXT_DOMAIN ),
                    'approved'	=> __( 'Successfully approved', CF7TEL_TEXT_DOMAIN ),
                    'refused'	=> __( 'Request refused', CF7TEL_TEXT_DOMAIN ),
                ),
            );
            
            if($hook == 'toplevel_page_wpcf7' || $hook == 'contact_page_wpcf7-new' || $hook == 'contact_page_cf7tel_telegram') {
                wp_enqueue_style( 'cf7teltelegram-admin-styles', CF7TEL_PLUGIN_URL . '/assets/css/admin.css', array(), CF7TEL_PLUGIN_VERSION );
                wp_enqueue_script( 'cf7teltelegram-admin', CF7TEL_PLUGIN_URL . '/assets/js/admin.js', array('jquery'), CF7TEL_PLUGIN_VERSION );
                wp_localize_script( 'cf7teltelegram-admin', 'wpData', $localize_params );
            }
        }

        /** Get bot token */
        private function load_bot_token(){
            $token = get_option( 'cf7tel_telegram_tkn' );
            $this->bot_token = empty( $token ) ? '' : $token;
            return $this;
        }

        /** Set bot token */
        private function set_bot_token( $token ){
            $this->bot_token = $token;
            update_option( 'cf7tel_telegram_tkn', $token, false );
            return $this;
        }

        /** On submit of bot token */
        public function save_bot_token() {            
            $token = $_REQUEST['cf7tel_telegram_tkn'];
            $this->set_bot_token( $token );
            return $this;
        }

        /** Save chats */
        private function save_chats( $chats ){
            update_option( 'cf7tel_telegram_chats', $chats, false );
            return $this;
        }

        /** Load connected chats */
        public function load_chats() {
            $chats = get_option( 'cf7tel_telegram_chats' );
            
            if ( ! empty( $chats ) && is_string( $chats ) ) :
                $list = explode( ',', $chats );
                $chats = array();
                
                foreach( $list as $item )
                $chats[ $item ] = array( 'id' => $item, 'status' => 'active', 'first_name' => '', 'last_name' => '' );
                
                $this->save_chats( $chats );
            endif;
            $this->chats = empty( $chats ) ? array() : ( array ) $chats;
            return $this;
        }

        /** Get bot token */
        public function get_bot_token() {
            return $this->bot_token;
        }

        private function get_api_url() {
            $token = $this->get_bot_token();
            return sprintf( $this->api_url, $token );
        }

        /** View full list section */
        public function view_full_list() {
            echo '<h2>'. __( 'Subscribers list', CF7TEL_TEXT_DOMAIN ) .'</h2>';

            $req = $app = false;

            $token = get_option('cf7tel_telegram_tkn');
            if(empty($token)) {
                update_option( 'cf7tel_telegram_chats', '', false );
            }else{
                $req = $this->pending_html_list();
                $app = $this->approved_html_list();
            }
            
            if ( ! $req && ! $app ) _e( 'List is empty', CF7TEL_TEXT_DOMAIN );
            
            echo '<p>', sprintf( __( 'Add user: send the <code>%s</code> comand to your bot', CF7TEL_TEXT_DOMAIN ), '/'. $this->cmd ), '</p>';
            echo '<p>', sprintf( __( 'Add group: add your bot to the group and send the <code>%s</code> comand to your group', CF7TEL_TEXT_DOMAIN ), '/'. $this->cmd ), '</p>';
        }

        private function approved_html_list(){
            $list = $this->get_chats();
            if ( empty( $list) ) return array();
            
            foreach( $list as $id => $chat )				
            echo vsprintf( $this->get_template( 'f_item' ), $this->get_listitem_data( $chat, 'active' ) );
    
            return true;
        }
        
        private function pending_html_list() {
            $data = $this->get_chats( 'pending' );
            if ( empty( $data ) ) return false;
            
            foreach( $data as $id => $item ) :
                echo vsprintf( $this->get_template( 'f_item' ), $this->get_listitem_data( $item ) );
            endforeach;
            
            return true;
        }

        private function get_template( $name ) {
            $t['f_item'] =
            '<div class="cf7tel_notice notice-%1$s is-dismissible" data-chat="%2$d" status="%1$s" >
                <div class="info dashicons-before dashicons-%3$s">
                    <span class="username"><strong>%4$s</strong></span>
                    <span class="nickname">%5$s</span>
                    %6$s
                </div>
                <div class="buttons">
                    <a class="approve" data-action="approve" ><span class="screen-reader-text">'. __( 'Approve', CF7TEL_TEXT_DOMAIN ) . '</span>'. __( 'Approve', CF7TEL_TEXT_DOMAIN ) . '</a>
                    <a class="pause" data-action="pause" ><span class="screen-reader-text">'. __( 'Pause', CF7TEL_TEXT_DOMAIN ) . '</span>'. __( 'Pause', CF7TEL_TEXT_DOMAIN ) . '</a>
                    <a class="refuse" data-action="refuse" ><span class="screen-reader-text">'. __( 'Delete', CF7TEL_TEXT_DOMAIN ) . '</span>'. __( 'Delete', CF7TEL_TEXT_DOMAIN ) . '</a>
                </div>
            </div>';
            
            return $t[ $name ];
        }
        
        /**
         * Send telegram message if configuration matches
         */
        public function send( $cf, & $abort, $instance ){
            $form_id = $cf->id();
            $form_title = $cf->title();
            $active_chats = $this->get_chats();
            
            $cf7tel_tel_option = get_option( 'cf7tel_connect_tel_' . $form_id , $default = array() );
            $list = (isset($cf7tel_tel_option['cf7tel_form_chats']) && !empty($cf7tel_tel_option['cf7tel_form_chats'])) ? explode(",",$cf7tel_tel_option['cf7tel_form_chats']) : array();
            $status = (isset($cf7tel_tel_option['cf7tel_status']) && !empty($cf7tel_tel_option['cf7tel_status'])) ? $cf7tel_tel_option['cf7tel_status'] : "";
            
            if ( empty( $status ) || empty( $list ) ) return;
            if ( $abort ) return;
            if ( apply_filters( 'cf7tel_skip_tg', false, $cf, $instance ) ) return;

            if(isset($cf7tel_tel_option['cf7tel_message_body']) && !empty($cf7tel_tel_option['cf7tel_message_body'])) {
                $telegram_msg_body = wp_unslash( $cf7tel_tel_option['cf7tel_message_body'] );
                $data = $instance->get_posted_data();
        
                $output = wpcf7_mail_replace_tags( @ $telegram_msg_body );
                $mode = 'HTML';

                $output = str_replace( "[form-title]", $form_title , $output );

                $output = wp_kses( $output, array(
                    'a'	=> array( 'href' => true ),
                    'b' => array(), 'strong' => array(), 'i' => array(), 'em' => array(), 'u' => array(), 'ins' => array(), 's' => array(), 'strike' => array(), 'del' => array(), 'code' => array(), 'pre' => array(),
                ) );	
                
                foreach( $list as $key => $chat_id ) :
                    if( !array_key_exists( $chat_id, $active_chats ) )  continue;
                    if ( ! is_numeric( $chat_id ) ) continue;			
                    $msg_data = array(
                        'chat_id'					=> $chat_id,
                        'text'						=> $output,
                        'parse_mode'				=> $mode,
                        'disable_web_page_preview'	=> true
                    );
                    $this->api_request( 'sendMessage', apply_filters( 'cf7tel_sendMessage', $msg_data, $chat_id, $mode ) );
                    do_action( 'cf7tel_message_sent', $msg_data, $instance );
                endforeach;
                
                
                do_action( 'cf7tel_messages_sent', $list, $output, $mode, $instance );
            }
            
        }

        /** Check entered bot */
        public function check_bot() {
            $check = $this->api_request( 'getMe' );
            
            if ( false === $check ) 
            return new WP_Error( 'check_bot_error', __( 'An error has occured. See php error log.', CF7TEL_TEXT_DOMAIN ) );
    
            return $check;		
        }

        /** Check entered bot status */
        public function bot_status(){
            if ( ! $this->has_token() ) return;
            $check_bot = $this->check_bot();
            $status_format = 
                '<div class="cf7tel_check_bot %s">
                    <strong class="status">%s</strong>
                    <div>'. __( 'Bot username', CF7TEL_TEXT_DOMAIN ) . ': <code class="bot_username">%s</code></div>
                </div>';
            
            if ( ! is_wp_error( $check_bot ) ) :
                echo ( true === @ $check_bot->ok ) ? 
                    sprintf( $status_format, 'online', __( 'Bot is online', CF7TEL_TEXT_DOMAIN ), '@' . $check_bot->result->username ) :
                    sprintf( $status_format, 'failed', __( 'Bot is broken', CF7TEL_TEXT_DOMAIN ), __( 'unknown', CF7TEL_TEXT_DOMAIN ) );
            else :
                echo $check_bot->get_error_message();
            endif;
        }

        public function get_listitem_data( $chat, $status = 'pending' ){
            $first_name = isset($chat['first_name']) ? $chat['first_name'] : '';
            $last_name = isset($chat['last_name']) ? $chat['last_name'] : '';
            $fullname = (!empty($first_name) && !empty($last_name)) ? $first_name .' '. $last_name : $first_name . $last_name;
            return array( 
                $status,
                $chat['id'],
                $chat['id'] > 0 ? 'admin-users' : 'groups',
                empty( $str = trim( $chat['id'] > 0 ?
                    $fullname :
                    $chat['title'] ) ) ? "[{$chat['id']}]" : $str,
                empty( $chat['username'] ) ? '' : '@'. $chat['username'],
                isset( $chat['date'] ) ? wp_date( 'j F Y H:i:s', $chat['date'] ) : '',
            );
        }

        public function get_chats( $status = 'active' ){
            $result = array();
            foreach ( $this->chats as $id => $chat ) :
                if ( $status == $chat['status'] )
                $result[ $id ] = $chat;
            endforeach;
            
            return $result;
        }

        function check_bot_updates() {
            $update_id = get_option( 'cf7tel_telegram_last_update_id' );
            $param = array(
                'allowed_updates'	=> array( 'message' ),
                'offset'			=> $update_id,
            );
            $updates = $this->api_request( 'getUpdates', $param );
            if ( empty( $updates->result ) ) return;		
            
            $update_ids = array();
            $upd = array();
            
            foreach( $updates->result as $one ) :
                $update_ids []= $one->update_id;
                
                if ( isset($one->message->entities) && is_array( $one->message->entities ) ) :
                    foreach( $one->message->entities as $ent ) :
                        $cmd = substr( $one->message->text, $ent->offset, $ent->length );
                        if ( 'bot_command' == $ent->type && '/' . $this->cmd === $cmd && empty( $this->chats[ $one->message->chat->id ] ) ) :
                            $upd[ $one->message->chat->id ] = ( array ) $one->message->chat;
                            $upd[ $one->message->chat->id ]['date'] = $one->message->date;
                            $upd[ $one->message->chat->id ]['status'] = 'pending';
                        endif;
                    endforeach;
                endif;
            
                if ( !isset($one->message->text) || isset($one->message->text) && false === strpos( $one->message->text, 'cf7tel_start' ) ) continue;
    
            endforeach;
            
            $this->chats += $upd;
            $this->save_chats( $this->chats );
    
            sort( $update_ids, SORT_NUMERIC );
            $next_update = array_pop( $update_ids );
            update_option( 'cf7tel_telegram_last_update_id', ( int ) $next_update + 1 );
        }

        private function action_approve( $chat_id, & $new_status ){
            $new_status = 'active';
            if ( empty( $this->chats[ $chat_id ] ) ) return false;
            $this->chats[ $chat_id ]['status'] = $new_status;
            $this->save_chats( $this->chats );
            
            $this->api_request( 'sendMessage', array(
                'chat_id'					=> $chat_id,
                'text'						=> __( 'Subscribed for Contact Form 7 notifications from', CF7TEL_TEXT_DOMAIN ) . ' ' . home_url(),
                'disable_web_page_preview'	=> true,
            ) );
            
            return true;
        }

        private function action_pause( $id, & $new_status ){
            $new_status = 'pending';
            if ( empty( $this->chats[ $id ] ) ) return false;
            $this->chats[ $id ]['status'] = $new_status;
            $this->save_chats( $this->chats );
            
            return true;
        }
        
        private function action_refuse( $id, & $new_status ){
            $new_status = 'deleted';
            unset( $this->chats[ $id ] );
            $this->save_chats( $this->chats );
            
            return true;
        }

        public function api_request( $method, $parameters = null, $headers = null ) {
            if ( ! is_string( $method ) ) :
                error_log( "[TELEGRAM] Method name must be a string\n" );
                return false;
            endif;
    
            if ( is_null( $parameters ) ):
                $parameters = array();
            endif;
    
            $url = $this->get_api_url() . $method;
            $args = array(
                'timeout'		=> 5,
                'redirection'	=> 5,
                'blocking'		=> true,
                'method'		=> 'POST',
                'body'			=> $parameters,
            );
            
            if ( ! empty( $headers ) )
            $args['headers'] = $headers;
            
            return $this->request( $url, $args );
        }

        private function request( $url, $args ) {
            $response = wp_remote_post( $url, $args );
            if ( is_wp_error( $response ) ) :
                error_log( "wp_remote_post returned error : ". $response->get_error_code() . ': ' . $response->get_error_message() . ' : ' . $response->get_error_data() ."\n");
                return false;
            endif;

            $http_code = intval( $response['response']['code'] );
            if ( $http_code >= 500 ) :
                error_log( "[TELEGRAM] Server return status {$http_code}" ."\n" );
                sleep( 3 );
                return false;

            elseif ( $http_code == 401 ) :
                error_log( "[TELEGRAM] Wrong token \n" );
                return json_decode( $response['body'] );

            elseif ( $http_code != 200 ) :
                error_log( "[TELEGRAM] Request has failed with error {$response['response']['code']}: {$response['response']['message']}\n" );
                return false;

            elseif ( empty( $response['body'] ) ) :
                error_log( "[TELEGRAM] Server return empty body" );
                return false;

            else :
                return json_decode( $response['body'] );
            endif;
        }
        
        private function has_token(){
            return $this->get_bot_token();
        }

        public function ajax(){
            check_ajax_referer( 'cf7tel_telegram_nonce' );
            $chat_id = @ $_POST['chat'];
            if ( empty( $chat_id ) ) wp_die( json_encode( new \WP_Error( 'empty_chat_id', 'There is no chat_id in request', array( 'status' => 400 ) ) ) );
            
            $action = 'action_' . @ $_POST['do_action'];
            if ( ! method_exists( $this, $action ) ) wp_die( json_encode( new \WP_Error( 'wrong_action', 'There is no correct action in request', array( 'status' => 400 ) ) ) );
            
            $new_status = '';
            echo json_encode( array( 'result' => $this->$action( $chat_id, $new_status ), 'chat' => $chat_id, 'new_status' => $new_status ) );
            wp_die();
        }

    }
    new cf7tel_tel_functions();
}