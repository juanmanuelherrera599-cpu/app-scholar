import React from 'react';
import {
  StyleSheet,
  Text,
  View,
  Image,
  TouchableOpacity,
} from 'react-native';

export default function HomeScreen({ navigation }) {
  return (
    <View style={styles.container}>

      <View style={styles.logoContainer}>
        <Image
          source={require('../assets/logo.jpeg')}
          style={styles.logo}
        />
      </View>

      <Text style={styles.titulo}>
        APP Scholar
      </Text>

      <Text style={styles.subtitulo}>
        Sistema Acadêmico Mobile
      </Text>

      <View style={styles.linha} />

      <Text style={styles.descricao}>
        Gerencie alunos, professores, cursos e
        informações acadêmicas em um só lugar.
      </Text>

      <TouchableOpacity
        style={styles.botao}
        onPress={() => navigation.navigate('Cadastros')}
        activeOpacity={0.8}
      >
        <Text style={styles.icone}>📚</Text>

        <View style={styles.textoContainer}>
          <Text style={styles.textoBotao}>
            Entrar no sistema
          </Text>

          <Text style={styles.textoSecundario}>
            Acessar cadastros
          </Text>
        </View>

        <Text style={styles.seta}>
          ›
        </Text>
      </TouchableOpacity>

      <Text style={styles.rodape}>
        APP Scholar • Sistema Acadêmico
      </Text>

    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    alignItems: 'center',
    justifyContent: 'center',
    paddingHorizontal: 25,
  },

  logoContainer: {
    width: 180,
    height: 180,
    borderRadius: 90,
    alignItems: 'center',
    justifyContent: 'center',
    marginBottom: 18,
    elevation: 5,
  },

  logo: {
    width: 165,
    height: 165,
    borderRadius: 82,
    resizeMode: 'contain',
  },

  titulo: {
    fontSize: 38,
    fontWeight: 'bold',
    textAlign: 'center',
    marginBottom: 6,
  },

  subtitulo: {
    fontSize: 17,
    textAlign: 'center',
    opacity: 0.7,
  },

  linha: {
    width: 70,
    height: 4,
    borderRadius: 5,
    marginVertical: 22,
  },

  descricao: {
    fontSize: 15,
    lineHeight: 22,
    textAlign: 'center',
    opacity: 0.65,
    marginBottom: 28,
    paddingHorizontal: 15,
  },

  botao: {
    width: '100%',
    minHeight: 75,
    borderRadius: 18,
    flexDirection: 'row',
    alignItems: 'center',
    paddingHorizontal: 20,
    elevation: 5,
  },

  icone: {
    fontSize: 28,
    marginRight: 15,
  },

  textoContainer: {
    flex: 1,
  },

  textoBotao: {
    fontSize: 18,
    fontWeight: 'bold',
  },

  textoSecundario: {
    fontSize: 13,
    marginTop: 3,
    opacity: 0.65,
  },

  seta: {
    fontSize: 32,
    fontWeight: 'bold',
  },

  rodape: {
    position: 'absolute',
    bottom: 20,
    fontSize: 12,
    opacity: 0.5,
  },
});