import React, { useState } from 'react';

import HomeScreen from './screens/HomeScreen';
import CadastrosScreen from './screens/CadastrosScreen';
import AlunosScreen from './screens/AlunosScreen';
import ConsultarAlunosScreen from './screens/ConsultarAlunosScreen';
import ProfessoresScreen from './screens/ProfessoresScreen';
import ResponsaveisScreen from './screens/ResponsaveisScreen';
import CursosScreen from './screens/CursosScreen';
import DisciplinasScreen from './screens/DisciplinasScreen';
import MatriculasScreen from './screens/MatriculasScreen';
import TurmasScreen from './screens/TurmasScreen';
import AvaliacoesScreen from './screens/AvaliacoesScreen';
import CoordenadoresScreen from './screens/CoordenadoresScreen';
import BoletimScreen from './screens/BoletimScreen';

export default function App() {
  const [tela, setTela] = useState('Home');

  const voltar = () => {
    if (tela === 'Cadastros') {
      setTela('Home');
    } else {
      setTela('Cadastros');
    }
  };

  const navigation = {
    navigate: (nomeTela) => setTela(nomeTela),
    goBack: voltar,
  };

  switch (tela) {
    case 'Cadastros':
      return <CadastrosScreen navigation={navigation} />;

    case 'Alunos':
      return <AlunosScreen navigation={navigation} />;

    case 'ConsultarAlunos':
  return <ConsultarAlunosScreen navigation={navigation} />;

    case 'Professores':
      return <ProfessoresScreen navigation={navigation} />;

    case 'Responsaveis':
      return <ResponsaveisScreen navigation={navigation} />;

    case 'Cursos':
      return <CursosScreen navigation={navigation} />;

    case 'Disciplinas':
      return <DisciplinasScreen navigation={navigation} />;

    case 'Matriculas':
      return <MatriculasScreen navigation={navigation} />;

    case 'Turmas':
      return <TurmasScreen navigation={navigation} />;

    case 'Avaliacoes':
      return <AvaliacoesScreen navigation={navigation} />;

    case 'Coordenadores':
      return <CoordenadoresScreen navigation={navigation} />;

    case 'Boletim':
      return <BoletimScreen navigation={navigation} />;

    default:
      return <HomeScreen navigation={navigation} />;
  }
}