import React from 'react';
import {
  StyleSheet,
  Text,
  View,
  TouchableOpacity,
  ScrollView,
} from 'react-native';

export default function CadastrosScreen({ navigation }) {
  const telas = [
    { nome: 'Alunos', icone: '👨‍🎓', tela: 'Alunos' },
    { nome: 'Professores', icone: '👨‍🏫', tela: 'Professores' },
    { nome: 'Responsáveis', icone: '👪', tela: 'Responsaveis' },
    { nome: 'Cursos', icone: '📚', tela: 'Cursos' },
    { nome: 'Disciplinas', icone: '📖', tela: 'Disciplinas' },
    { nome: 'Matrículas', icone: '📝', tela: 'Matriculas' },
    { nome: 'Turmas', icone: '🏫', tela: 'Turmas' },
    { nome: 'Avaliações', icone: '📊', tela: 'Avaliacoes' },
    { nome: 'Coordenadores', icone: '👔', tela: 'Coordenadores' },
    { nome: 'Boletim', icone: '📋', tela: 'Boletim' },
  ];

  return (
    <ScrollView contentContainerStyle={styles.container}>

      <Text style={styles.titulo}>Cadastros</Text>

      <Text style={styles.subtitulo}>
        Escolha uma opção
      </Text>

      <View style={styles.lista}>
        {telas.map((item) => (
          <TouchableOpacity
            key={item.tela}
            style={styles.card}
            onPress={() => navigation.navigate(item.tela)}
            activeOpacity={0.8}
          >
            <Text style={styles.icone}>{item.icone}</Text>

            <Text style={styles.nome}>
              {item.nome}
            </Text>

            <Text style={styles.seta}>›</Text>
          </TouchableOpacity>
        ))}
      </View>

      <TouchableOpacity
        style={styles.voltar}
        onPress={() => navigation.goBack()}
      >
        <Text style={styles.textoVoltar}>← Voltar</Text>
      </TouchableOpacity>

    </ScrollView>
  );
}

const styles = StyleSheet.create({
  container: {
    flexGrow: 1,
    paddingHorizontal: 20,
    paddingTop: 30,
    paddingBottom: 30,
  },

  titulo: {
    fontSize: 34,
    fontWeight: 'bold',
    textAlign: 'center',
    marginBottom: 6,
  },

  subtitulo: {
    fontSize: 16,
    textAlign: 'center',
    opacity: 0.6,
    marginBottom: 25,
  },

  lista: {
    width: '100%',
  },

  card: {
    width: '100%',
    minHeight: 68,
    borderRadius: 16,
    flexDirection: 'row',
    alignItems: 'center',
    paddingHorizontal: 18,
    marginBottom: 12,
    elevation: 3,
  },

  icone: {
    fontSize: 25,
    width: 45,
  },

  nome: {
    flex: 1,
    fontSize: 17,
    fontWeight: 'bold',
  },

  seta: {
    fontSize: 30,
    fontWeight: 'bold',
    opacity: 0.5,
  },

  voltar: {
    alignItems: 'center',
    marginTop: 15,
    paddingVertical: 12,
  },

  textoVoltar: {
    fontSize: 16,
    fontWeight: 'bold',
  },
});